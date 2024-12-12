<?PHP
class TrabalheController extends ContatosAppController{
    
    public $paginate = array('limit'=>10,'order'=>'id DESC');
    public $components = array('Painel.Uploading');
    
    public function index(){
        $this->Seo->title('Trabalhe Conosco');

        $vagas = $this->Vaga->find('all',array('order'=>'Vaga.order_registro ASC', 'Vaga.created DESC'));
   
        if($this->data && $this->request->is('post')){
            
            if($this->data['Trabalhe']['nome'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Nome.'); 
            }else if($this->data['Trabalhe']['email'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo E-mail.'); 
            }else if($this->data['Trabalhe']['telefone'] === ''){
                $this->message_empty('ATENÇÃO: Preencha o campo Telefone.'); 
            }
            
            $this->Uploading->allowed = array('pdf','doc','docx','PDF','DOC');
            if($this->data['Trabalhe']['curriculo']['name']){
                $arquivo = $this->Uploading->send_file('files/curriculos', $this->data['Trabalhe']['curriculo']);
                if($arquivo){
                    $this->request->data['Trabalhe']['curriculo'] = $arquivo;
                }else{
                    $this->message_empty("ATENÇÃO: Arquivo enviado não é PDF ou DOC."); 
                }
            }else{
                $this->request->data['Trabalhe']['curriculo'] = '';
            }
            
            if($this->Trabalhe->save($this->data)){
                $this->send_mail($this->data);
                $this->set('add_sucess',true);
            }else{
                $this->message_empty('ERRO: Não foi possível enviar seus dados, tente novamente mais tarde'); 
            }
        }

        $this->set('vagas',$vagas);
    }
    
    private function send_mail($data){
       // $outro = $this->Outro->find('first');
        $send_mail = array();
       // if($outro['Outro']['trabalhe']){
       //     $expld = explode(';',$outro['Outro']['trabalhe']);
       //     foreach ($expld as $key => $value) {
       //         $send_mail[] = trim($value);
        //    }
       // }
        
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('Contatos.trabalhe_conosco');
        
        if($send_mail){
            $mail->to($send_mail);
            $mail->bcc('joaovictor@joaovictor.dev.br');
        }else{
            $mail->to('joaovictor@joaovictor.dev.br');
        }

        $mail->emailFormat('html');
        $mail->replyTo($data['Trabalhe']['email']);
        $mail->subject('Currículo - '.date('d/m/Y - H:i').'');
        $mail->viewVars(array('data'=>$data['Trabalhe']));
        if(isset($this->data['Trabalhe']['curriculo']) && $this->data['Trabalhe']['curriculo']){
            $mail->attachments($this->data['Trabalhe']['curriculo']);
        }
        return $mail->send();
    }

    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['order'] = 'Trabalhe.created DESC';
        
        $this->set('posts',$this->paginate('Trabalhe'));
        $this->set('total',$this->Trabalhe->find('count'));
    }
    
    public function admin_view($id){
        $this->layout = 'Painel.admin';
        $this->set('post',$this->Trabalhe->read('*',$id));
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Trabalhe->delete($id)) $this->redirect(array('action'=>'index'));
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