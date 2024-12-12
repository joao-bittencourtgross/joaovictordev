<?PHP
class TermoController extends TermoAppController{
    
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function index(){
        $this->layout = false;
        $this->autoRender = false;
        $this->Seo->title('Termos de Uso');
        $post = $this->Termo->find('first');
        $this->set('post',$post);
    }
    
    public function politica(){
        $this->layout = 'default';
        $this->Seo->title('Política de Privacidade');
        $post = $this->Termo->find('first');
        $this->set('post',$post);
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Termo->save($this->request->data)){
                $this->redirect(array('action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $post = $this->Termo->find('first');
        $this->data = $this->Termo->read('*',$post['Termo']['id']); 
    }
    
}