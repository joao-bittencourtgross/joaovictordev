<?PHP
class BannerContato extends BannersAppModel {
    
    var $useTable = 'banners_contatos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(BannerContato.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(BannerContato.modified,'%d/%m/%Y %H:%i')",
    );
    
//    public $actsAs = array(
//        'Painel.Gallery',
//        'Painel.Videos',
//    );
    
}