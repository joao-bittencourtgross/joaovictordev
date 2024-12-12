<?PHP
class ExperienciasController extends ExperienciasAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Experiencia.order_registro'=>'ASC', 'Experiencia.created' => 'DESC');
        $posts = $this->paginate('Experiencia');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
//            unset($this->request->data['Experiencia']['id']);
            
            if($this->Experiencia->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Experiencia->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Experiencia->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   

    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Experiencia->query('UPDATE tb_experiencias SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}