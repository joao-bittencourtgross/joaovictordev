<?PHP
class Experiencia extends ExperienciasAppModel{

    var $useTable = 'experiencias';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Experiencia.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Experiencia.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'titulo'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('titulo'=>'slug'),
        'Searchable'=>array('titulo','texto')
    );
    
}