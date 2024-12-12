<?PHP
class BannerContatoController extends BannersAppController{
    
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->BannerContato->save($this->request->data)){
                $this->redirect(array('action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $post = $this->BannerContato->find('first');
        $this->data = $this->BannerContato->read('*',$post['BannerContato']['id']); 
    }
    
}