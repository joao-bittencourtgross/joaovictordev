<?PHP
class OutroController extends DepartamentosAppController {

    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Outro->save($this->request->data)){
                $this->redirect(array('plugin'=>'departamentos','controller'=>'outro','action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $this->data = $this->Outro->find('first'); 
    }
    
}