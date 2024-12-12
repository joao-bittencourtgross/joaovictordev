<?PHP
class CategoriaLotesController extends LotesAppController{
    
    public $paginate=array('limit'=>15,'order'=>array('order'=>'ASC','created'=>'DESC'));
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['order'] = array('CategoriaLote.order_registro' => 'ASC', 'CategoriaLote.created' => 'DESC');
        $posts = $this->paginate('CategoriaLote');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->CategoriaLote->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $this->data=$this->CategoriaLote->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->CategoriaLote->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->CategoriaLote->query('UPDATE tb_lotes_categoria SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}