<?PHP
class Termo extends TermoAppModel {
    
    var $useTable = 'termo';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Termo.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Termo.modified,'%d/%m/%Y %H:%i')",
    );
    
}