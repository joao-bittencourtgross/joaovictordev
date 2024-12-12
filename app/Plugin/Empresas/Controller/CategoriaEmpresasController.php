<?PHP
class CategoriaEmpresasController extends EmpresasAppController{
    
    public $paginate=array('limit'=>15,'order'=>array('order'=>'ASC','created'=>'DESC'));
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['order'] = array('CategoriaEmpresa.order_registro'=>'ASC', 'CategoriaEmpresa.created'=>'DESC');
        $posts = $this->paginate('CategoriaEmpresa');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->CategoriaEmpresa->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $this->data = $this->CategoriaEmpresa->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->CategoriaEmpresa->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->CategoriaEmpresa->query('UPDATE tb_empresas_categorias SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}