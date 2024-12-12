<?PHP
class DepartamentosController extends DepartamentosAppController{

    public $paginate = array('limit'=>16,'order'=>array('Departamento.order_registro' => 'ASC', 'Departamento.created' => 'DESC'));
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['order'] = array('Departamento.order_registro' => 'ASC', 'Departamento.created' => 'DESC');
        $posts = $this->paginate('Departamento');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Departamento->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->data=$this->Departamento->read('*',$id); 
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Departamento->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $registro['Departamento'] = array('id' => $id, 'order_registro' => $order);
        $this->Departamento->save($registro);
    }
    
}