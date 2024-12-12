<?PHP
class Planta extends EmprendimentosAppModel{
    
    var $useTable = 'plantas_emprendimento';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Planta.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Planta.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
//        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
    public $belongsTo = array(
        'Emprendimento' => array(
            'className'  =>'Emprendimentos.Emprendimento',
            'foreignKey' =>'emp_id'
        ),
    );
    
}