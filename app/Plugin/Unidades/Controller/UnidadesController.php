<?PHP
class UnidadesController extends UnidadesAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Unidade.order_registro'=>'ASC','Unidade.created'=>'DESC');
        $posts = $this->paginate('Unidade');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Unidade->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Unidade->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_replicar($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $registro = $this->Unidade->find('first',array('conditions'=>array('Unidade.id'=>$id))); 
        $registro['Unidade']['id'] = '';
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Unidade->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Unidade->query('UPDATE tb_unidades SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
//    public function cache_cidades(){
//        $cache_cidade['cascavel-pr'] = $this->Unidade->find('first',array('conditions'=>array('Unidade.slug'=>'cascavel-pr')));
//        $cache_cidade['campo-grande-ms'] = $this->Unidade->find('first',array('conditions'=>array('Unidade.slug'=>'campo-grande-ms')));
//        
//        Cache::write('cache_cidade',$cache_cidade);
//    }
    
}