<?PHP
class BannersController extends BannersAppController{
    
    public $paginate=array('limit'=>10,'order'=>array('modified'=>'ASC'));
    
    public function admin_index(){
        $this->layout = "Painel.admin";
        $this->paginate['order'] = array('Banner.order_registro'=>'ASC','Banner.created'=>'DESC');
        $posts=$this->paginate('Banner');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Banner->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
        
        $select_cidade = $this->Help->arr_cidade_uf();
        $this->set('select_cidade',$select_cidade);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $this->data = $this->Banner->read('*',$id);
        
        $select_cidade = $this->Help->arr_cidade_uf();
        $this->set('select_cidade',$select_cidade);
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Banner->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Banner->query('UPDATE tb_banners SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
}