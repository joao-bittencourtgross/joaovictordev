<?PHP
class Download extends PainelAppModel{
    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(created,'%d/%m/%Y %H:%i')",
        'date'=>"DATE_FORMAT(created,'%d/%m/%Y')",
    );
    
}