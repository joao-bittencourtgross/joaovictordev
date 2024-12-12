<?PHP
class Certificacao extends CertificacoesAppModel{

    var $useTable = 'certificacoes';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Certificacao.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Certificacao.modified,'%d/%m/%Y %H:%i')",
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