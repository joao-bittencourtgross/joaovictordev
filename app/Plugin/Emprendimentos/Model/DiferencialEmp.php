<?PHP
class DiferencialEmp extends EmprendimentosAppModel{
    
    var $useTable = 'emp_diferenciais';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(DiferencialEmp.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(DiferencialEmp.modified,'%d/%m/%Y %H:%i')",
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

    public $hasMany = array(
        'DiferencialEmpOpc' => array(
            'className'  => 'Emprendimentos.DiferencialEmpOpc',
            'foreignKey' => 'campo_id',
            'order'      => array('DiferencialEmpOpc.order_registro'=>'ASC', 'DiferencialEmpOpc.created'=>'DESC'),
        )
    );
    
}