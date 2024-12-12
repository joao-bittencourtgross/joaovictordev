<?PHP
class Educacao extends EducacoesAppModel{

    var $useTable = 'educacoes';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Educacao.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Educacao.modified,'%d/%m/%Y %H:%i')",
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