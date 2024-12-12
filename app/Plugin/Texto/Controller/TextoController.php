<?PHP
class TextoController extends TextoAppController{
    
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Texto->save($this->request->data)){
                $this->redirect(array('action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $post = $this->Texto->find('first');
        $this->data = $this->Texto->read('*',$post['Texto']['id']); 
    }
    
}