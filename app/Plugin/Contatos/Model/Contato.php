<?PHP
class Contato extends ContatosAppModel{
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Contato.created,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'nome'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
        'email'=>array('rule'=>'email','message'=>'Não é um e-mail válido'),
        'telefone'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
}