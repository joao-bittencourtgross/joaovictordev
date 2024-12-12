<?PHP
class ContatoProdutor extends ContatosAppModel {
    
    var $useTable = 'contato_produtor';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(ContatoProdutor.created,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'nome'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
        'email'=>array('rule'=>'email','message'=>'Não é um e-mail válido'),
        'telefone'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    
}