<?PHP
class ContatoProdutorController extends ContatosAppController{
    
    public $components = array('Painel.Uploading');
    public $paginate = array('limit'=>10,'order'=>'id DESC');
    
    public function index(){
        $this->Seo->title('Representante');
        
        if($this->data && $this->request->is('post')){
            if($this->data['ContatoProdutor']['nome'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Nome.'); 
            }else if($this->data['ContatoProdutor']['email'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo E-mail.'); 
            }else if($this->data['ContatoProdutor']['telefone'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Telefone.'); 
            }
            
            $this->request->data['ContatoProdutor']['plataforma'] = $this->Help->save_platform();
            
            if($this->ContatoProdutor->save($this->data)){
                $this->send_mail($this->data);
                $this->set('add_sucess',true);
            }else{
                $this->message_empty('ERRO: Não foi possível enviar seus dados, tente novamente mais tarde'); 
            }
        }
        
    }
    
    private function send_mail($data){
      //  $outro = $this->Outro->find('first');
        $send_mail = array();
       // if($outro['Outro']['produtor']){
       //     $expld = explode(';',$outro['Outro']['produtor']);
       //     foreach ($expld as $key => $value) {
       //         $send_mail[] = trim($value);
       //     }
      //  }
        
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('Contatos.representante');
        
        if($send_mail){
            $mail->to($send_mail);
            $mail->bcc('joaovictor@joaovictor.dev.br');
        }else{
            $mail->to('joaovictor@joaovictor.dev.br');
        }

        $mail->emailFormat('html');
        $mail->subject("Representante - ".date('d/m/Y - H:i')."");
        $mail->viewVars(array('data'=>$data['ContatoProdutor']));
        return $mail->send();
    }
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->paginate['order'] = 'ContatoProdutor.created DESC';
        $this->set('posts',$this->paginate('ContatoProdutor'));
        $this->set('total',$this->ContatoProdutor->find('count'));
    }
    
    public function admin_view($id){
        $this->layout="Painel.admin";
        $this->set('post',$this->ContatoProdutor->read('*',$id));
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->ContatoProdutor->delete($id)) $this->redirect(array('action'=>'index'));
    }
    
    public function message_empty($text){
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<script type="text/javascript">';
        echo 'alert("'.$text.'");';
        echo 'history.go(-1);';
        echo '</script>';
        exit; 
    }
}