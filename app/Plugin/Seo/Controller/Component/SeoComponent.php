<?PHP
class SeoComponent extends Component{
    
    public static $keywords;
    public static $title;
    public static $canonical;
    public static $author;
    public static $description;
    public static $analytics;
    private $controller;
    
    public function initialize(Controller $controller){
        $this->controller=$controller;
        parent::initialize($controller);
        $keywords=ClassRegistry::init('Seo.SeoKeyword')->glue();
        $config=ClassRegistry::init('Seo.SeoConfig')->find('first');
        self::$keywords=$keywords;
        self::$title=$config['SeoConfig']['title'];
        self::$canonical=str_replace('www.','',Router::url('', true));
        self::$author=$config['SeoConfig']['author'];
        self::$description=$config['SeoConfig']['description'];
        self::$analytics=$config['SeoConfig']['analytics'];
        $controller->helpers[]='Seo.Seo';
        $controller->set('title_for_layout', $config['SeoConfig']['title']);
        $controller->set('canonical',SeoComponent::$canonical);
    }
    
    public function title($title){
        $this->controller->set('title_for_layout',"$title - ".SeoComponent::$title);
    }
    
    public function canonical(){
        $this->controller->set('canonical',SeoComponent::$canonical);
    }
    
    public function keywords($keywords){
        if(is_array($keywords)) $keywords=  implode (', ', $keywords);
        self::$keywords=$keywords;
    }
    
    public function author($author){
        self::$author=$author;
    }
    
    public function description($description){
        self::$description=$description;
    }
}