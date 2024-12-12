<?PHP
class Trabalhe extends ContatosAppModel{
    
    var $useTable = 'curriculos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Trabalhe.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Trabalhe.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'nome'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
        'email'=>array('rule'=>'email','message'=>'Não é um e-mail válido'),
        'telefone'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
}