<?PHP
App::import('Component', 'Auth');
class LockerComponent extends AuthComponent{
    
    public $components=array('Session');
    public $authenticate = array('Form' => array('userModel' => 'Painel.User'));
    public $loginRedirect="/";
    public $logoutRedirect='/admin';
    public $loginAction = "/admin";
    public $notallowed = "/notallowed";
    public $config;
    public $message;
    public $here;
    public $base;
    
    public function initialize(Controller $controller){
               
        parent::initialize($controller);
        $controller->helpers[]='Painel.Locker';
        $this->allow();
        $params=$controller->request->params;
        $config_file=APP.'Config'.DS.'locker.php';
        
        if(file_exists($config_file)){
            include_once($config_file);
            $this->config=new LOCKER_CONFIG();
            $params=$this->request->params;
            if(isset($params['plugin'])) $c=$params['plugin'].'.'.$params['controller'];
            else $c=$params['controller'];
            $a=$params['action'];
            $p=(isset($params['prefix']) && !empty($params['prefix']))?$params['prefix']:null;
            $this->check($c,$a,$p);
        } else {
            return false;
        }
    }
    
    public function list_groups($empty=false){
        $groups=$this->config->groups;
        $output=array();
        if($empty) $output[]='';
        foreach($groups as $k=>$v){ $output[$k]=$v['name']; }
        unset($output['amexcom']);  // adicionado
        return $output;
    }
    
    public function login($user = null) {
        $login=parent::login($user);
        if($login){            
            if(!$this->isActive()) return false;
            if($this->Session->read('Painel.redirect')){
                $this->loginRedirect=$this->Session->read('Painel.redirect');
                $this->Session->delete('Painel.redirect');
            } else {
                $group=$this->user('group');
                $this->loginRedirect=$this->config->groups[$group]['loginRedirect'];
            }
        } else {
            $this->message=__('Usuário e/ou senha incorreto(s)');
        }
        return $login;
    }
    
    public function alert($message){
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo '</script>';
    }
    
    public function js_redirect($location){
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$location.'";';
        echo '</script>';
    }
    
    private function check($controller,$action,$prefix=null){
        if(isset($this->config->prefixes)) $prefixes=$this->config->prefixes;
        if(isset($this->config->sectors)) $actions=$this->config->sectors;
        
        if(!$this->loggedIn()){
            if(isset($prefixes[$prefix])) $this->lock();
            if(isset($actions[$controller][$action]) || isset($actions[$controller]['*'])) $this->lock();
        } else {
            $group=$this->user('group');
            if(!empty($group)){
                $this->loginRedirect=$this->config->groups[$group]['loginRedirect'];
                $this->logoutRedirect=$this->config->groups[$group]['logoutRedirect'];
            }
            if(isset($prefixes[$prefix])){
                if(!in_array($group, $prefixes[$prefix])) $this->lock();
            }
            if(isset($actions[$controller]['*'])){
                if(!in_array($group, $actions[$controller]['*'])) $this->lock();
            } else if(isset($actions[$controller][$action])){
                if(!in_array($group, $actions[$controller][$action])) $this->lock();
            }
        }
    }
    
    private function lock(){
        if($this->loggedIn()){
            throw new NotFoundException(__('Você não tem permissão para acessar esta página'));
            exit;
        } else {
            $r="/".$this->request->url;
            $this->Session->write('Painel.redirect',$r);
            $this->deny();
        }
    }
    
    private function isActive() {
        if (!$this->user('active')) {
            $this->logout();
            $this->message = __("Usuário está bloqueado");
            return false;
        }
//        if($this->user('Activate.user_id')){
//            $this->logout();
//            $this->message=__('Você ainda não ativou seu usuário');
//            return false;
//        }
        return true;
    }
}