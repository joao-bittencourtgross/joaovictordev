<?PHP
class AempresaController extends AempresaAppController{
    
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function index(){
        $this->Seo->title('Sobre Mim');

        $experiencias = $this->Experiencia->find('all');
        $educacoes = $this->Educacao->find('all');
        
        $this->set('post',$this->Aempresa->find('first'));
        $this->set('experiencias', $experiencias);
        $this->set('educacoes', $educacoes);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Aempresa->save($this->request->data)){
                $this->redirect(array('action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $post = $this->Aempresa->find('first');
        $this->data = $this->Aempresa->read('*',$post['Aempresa']['id']); 
    }
    
}