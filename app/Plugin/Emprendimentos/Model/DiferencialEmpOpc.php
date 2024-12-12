<?PHP
class DiferencialEmpOpc extends EmprendimentosAppModel{
    
    var $useTable = 'emp_diferenciais_opc';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(DiferencialEmpOpc.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(DiferencialEmpOpc.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
}