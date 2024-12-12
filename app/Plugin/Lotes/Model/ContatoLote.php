<?PHP
class ContatoLote extends LotesAppModel {
    
    var $useTable = 'contato_lote';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(ContatoLote.created,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'nome'     => array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
        'email'    => array('rule'=>'email','message'=>'Não é um e-mail válido'),
        'telefone' => array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public function afterSave($created,$option = array()) {
        parent::afterSave($created);
        $date = date('d/m/Y - H:i');
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('Lotes.lote');
        
        $mail->to(array('contato@bellacasaeokada.com.br','fernando@bellacasaeokada.com.br'));
        $mail->bcc(array('artur@amexcom.com.br'));
        
        $mail->replyTo($this->data['ContatoLote']['email']);
        $mail->emailFormat('html');
        $mail->subject("Acesso aos valores Paraíso Tropical - $date");
        $mail->viewVars(array('data'=>$this->data['ContatoLote']));
        return $mail->send();
    }
    
}