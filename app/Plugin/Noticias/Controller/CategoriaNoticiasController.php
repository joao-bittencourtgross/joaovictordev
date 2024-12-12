<?PHP
class CategoriaNoticiasController extends NoticiasAppController{
    
    public $paginate=array('limit'=>15,'order'=>array('order'=>'ASC','created'=>'DESC'));
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->paginate['order']=array('order'=>'ASC','created'=>'DESC');
        $posts=$this->paginate('CategoriaNoticia');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->CategoriaNoticia->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->data=$this->CategoriaNoticia->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->CategoriaNoticia->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
}