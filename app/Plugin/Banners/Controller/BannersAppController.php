<?PHP
class BannersAppController extends AppController{
    
    public $uses = array(
        'Banners.Banner',
        'Banners.BannerContato'
    );
    
}