<?PHP
class EducacoesController extends EducacoesAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Educacao.order_registro'=>'ASC', 'Educacao.created' => 'DESC');
        $posts = $this->paginate('Educacao');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
//            unset($this->request->data['Educacao']['id']);
            
            if($this->Educacao->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Educacao->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Educacao->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   

    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Educacao->query('UPDATE tb_educacoes SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}