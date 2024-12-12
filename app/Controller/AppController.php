<?PHP
App::uses('Controller', 'Controller');
class AppController extends Controller {

    public $components = array(
        'Painel.Locker',
        'Seo.Seo',
        'Session',
        'Cookie',
        'Help'
    );
    
    public $helpers = array(
        'Media.Crop',
        'Media.Resize',
        'Media.Fill',
        'Less.Less',
        'Session',
    );
    
    public $uses = array(
        'AcessoSite.AcessoSite',
        'Contatos.Contato',
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        
    }

    public function afterFilter() {
        $this->acesso_paginas();
        
        if($this->response->statusCode() == '404'){
            $this->redirect(array('plugin'=>false,'controller'=>'pages','action'=>'page404')); 
        }
    }
    
    public function acesso_paginas(){
        if(!$this->Help->verify_text($_SERVER['REQUEST_URI'])){
            if(!$this->Session->check('SessaoAcesso')){
                $session_id = $this->Help->create_session();
                $this->Session->write('SessaoAcesso',$session_id); 
            }

            $save_page['AcessoSite'] = array(
                'id'         => '', 
                'sessao'     => $this->Session->read('SessaoAcesso'),
                'pagina'     => $this->here,
                'plataforma' => $this->Help->save_platform(),
                'ip'         => $this->Help->get_ip(),
            );
            $this->AcessoSite->save($save_page);
        }
    }
    
}