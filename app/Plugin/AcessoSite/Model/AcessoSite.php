<?PHP
class AcessoSite extends AcessoSiteAppModel{
    
    var $useTable = 'paginas';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(AcessoSite.created,'%d/%m/%Y %H:%i')",
    );
    
}