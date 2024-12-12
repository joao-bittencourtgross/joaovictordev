<?PHP
class Aempresa extends AempresaAppModel {
    
    var $useTable = 'aempresa';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Aempresa.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Aempresa.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
    );
    
}