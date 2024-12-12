<?PHP
class Cidade extends CidadesAppModel{
    
    var $useTable = 'cidades';
    
    public $virtualFields = array(
      'cdate'=>"DATE_FORMAT(Cidade.created,'%d/%m/%Y %H:%i')",
      'mdate'=>"DATE_FORMAT(Cidade.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
//        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
    public $hasMany = array(
        'Emprendimento' => array(
            'className'  => 'Emprendimentos.Emprendimento',
            'foreignKey' => 'cidade_id'
        )
    );
    
}