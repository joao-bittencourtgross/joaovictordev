<?PHP
class Vaga extends VagasAppModel{

    var $useTable = 'vagas';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Vaga.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Vaga.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
        'Searchable'=>array('title','texto')
    );
    
}