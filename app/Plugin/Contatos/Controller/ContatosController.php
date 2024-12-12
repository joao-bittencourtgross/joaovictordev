<?PHP
class ContatosController extends ContatosAppController{
    
    public $components = array('Help');
    public $paginate = array('limit'=>10,'order'=>'id DESC');
    
    public function index(){
        $this->Seo->title('Contato');
        
        if($this->data && $this->request->is('post')){
            if($this->data['Contato']['nome'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Nome.'); 
            }else if($this->data['Contato']['email'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo E-mail.'); 
            }else if($this->data['Contato']['telefone'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Telefone.'); 
            }
            
            $this->request->data['Contato']['plataforma'] = $this->Help->save_platform();
            
           // $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcVr94ZAAAAADy3Ss6P7cy4FOKwkzfSSdaA3hk1&response=".$this->data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
           // $response = json_decode($recaptcha, true);
           // if(!$response['success']){
            //    $this->message_empty('ATENÇÃO: Captcha não é válido.'); 
          //  }
            
            if($this->Contato->save($this->data)){
                $this->send_mail($this->data);
                $this->set('add_sucess',true);
               // $this->set('tag_emp',$this->data['Contato']['tag_emp']);
            }else{
                $this->message_empty('ERRO: Não foi possível enviar seus dados, tente novamente mais tarde'); 
            }
        }
        
    }
    
    private function send_mail($data){
       // $outro = $this->Outro->find('first');
        $send_mail = array();
       // if($outro['Outro']['contato']){
       //     $expld = explode(';',$outro['Outro']['contato']);
       //     foreach ($expld as $key => $value) {
       //         $send_mail[] = trim($value);
       //     }
       // }
        
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('Contatos.contato');
        
        if($send_mail){
            $mail->to($send_mail);
            $mail->bcc('joaovictor@joaovictor.dev.br');
        }else{
            $mail->to('joaovictor@joaovictor.dev.br');
        }
        
        $mail->replyTo($this->data['Contato']['email']);
        $mail->emailFormat('html');
        $mail->subject('Contato via site - '.date('d/m/Y - H:i').'');
        $mail->viewVars(array('data'=>$this->data['Contato']));
        return $mail->send();
    }

    public function admin_index(){
        $this->layout="Painel.admin";
        $this->paginate['order'] = 'Contato.created DESC';
        $this->set('posts',$this->paginate('Contato'));
        $this->set('total',$this->Contato->find('count'));
    }
    
    public function admin_view($id){
        $this->layout="Painel.admin";
        $this->set('post',$this->Contato->read('*',$id));
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Contato->delete($id)) $this->redirect(array('action'=>'index'));
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