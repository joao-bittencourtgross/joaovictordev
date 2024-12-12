<?PHP
class Galeria extends EmprendimentosAppModel{
    
    var $useTable = 'galerias_emprendimento';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Galeria.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Galeria.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
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