<?PHP
class Texto extends TextoAppModel {
    
    var $useTable = 'textos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Texto.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Texto.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
    );
    
}