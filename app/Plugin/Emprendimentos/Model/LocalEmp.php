<?PHP
class LocalEmp extends EmprendimentosAppModel{
    
    var $useTable = 'emp_localidades';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(LocalEmp.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(LocalEmp.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
    public $belongsTo = array(
        'Emprendimento' => array(
            'className'  =>'Emprendimentos.Emprendimento',
            'foreignKey' =>'empreendimento_id'
        ),
    );
    
}