<?PHP
class Departamento extends DepartamentosAppModel {
    
    var $useTable = 'emails_departamentos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Departamento.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Departamento.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $actsAs = array(
        'Painel.Slug'=>array('title'=>'slug'),
    );
    
}