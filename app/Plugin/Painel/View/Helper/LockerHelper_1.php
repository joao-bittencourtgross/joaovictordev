<?PHP
class LockerHelper extends AppHelper{
    
    public $helpers=array('Html');
    private $config_file;
    private $config=false;
    
    public function __construct(View $View) {
        parent::__construct($View);
        $this->config_file=APP.'Config'.DS.'locker.php';
        if(file_exists($this->config_file)){
            include_once $this->config_file;
            $this->config=new LOCKER_CONFIG();
        }
    }
    
    public function link($title,$url=null,$options=array(),$confirm=false){
        $link = $this->Html->link($title,$url,$options,$confirm);
        return $this->check($url,$link);
    }
    
    private function check($url,$output){
        if(!$this->config) return $output;
        $url=Router::url($url);
        if($this->base!='/') $url=Router::parse(str_replace($this->base,'',$url));
        else $url=Router::parse($url);        
        $group = LockerComponent::user('group');
        ######## PREFIXES ##############
        if(isset($this->config->prefixes)) $prefixes=$this->config->prefixes;        
        if(isset($url['prefix']) && !empty($url['prefix']) && isset($prefixes[$url['prefix']])){
            $groups=$prefixes[$url['prefix']];
            if(!$this->loggedIn()) return null;
            if(!in_array($group, $groups)) return null;
        }
        
        ######### ACTIONS ################
        if(isset($this->config->sectors)) $actions=$this->config->sectors;
        $controller=(isset($url['plugin']) && !empty($url['plugin']))? $url['plugin'].'.'.$url['controller']:$url['controller'];       
        if(isset($actions[$controller])){
            $action=$url['action'];
            if(isset($actions[$controller]['*'])){
                if(!$this->loggedIn()) return null;
                if(!in_array($group,$actions[$controller]['*'])) return null;
            }
            if(isset($actions[$controller][$action])){
                if(!$this->loggedIn()) return null;
                if(!in_array($group,$actions[$controller][$action])) return null;
            }
        }
        return $output;
    }
    
    public function loggedIn(){
        $user=  LockerComponent::user();
        if($user=='' || count($user)==0 || empty($user)) return false;
        return true;
    }    
}