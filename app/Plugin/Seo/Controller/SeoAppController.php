<?PHP
class SeoAppController extends AppController{
    
    public $layout="Painel.admin";
    public $uses=array('Seo.SeoConfig','Seo.SeoKeyword');
    
}