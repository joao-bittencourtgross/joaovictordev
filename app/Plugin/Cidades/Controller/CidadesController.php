<?PHP
class CidadesController extends CidadesAppController{
    
    public $paginate = array('limit'=>50,'order'=>array('created'=>'DESC'));
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Cidade.order_registro'=>'ASC','Cidade.created'=>'DESC');
        $posts = $this->paginate('Cidade');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Cidade->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Cidade->find('first',array('conditions' => array('Cidade.id'=>$id))); 
        
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Cidade->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Cidade->query('UPDATE tb_cidades SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}