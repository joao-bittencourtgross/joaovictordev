<?PHP
class UsuariosController extends PainelAppController {
    
    public $components = array('Session','Menssage');
    public $uses = array('Painel.Gallery');
    
        
    public function beforeFilter(){
        parent::beforeFilter();
        $groups = $this->Locker->list_groups(true);
        $this->set(compact('groups'));
    }    
    
    public function login() {        
        $teste = $this->Session->read('Painel.redirect');
        $this->layout = false;        
        if($this->Locker->loggedIn()){            
            $this->redirect($this->Locker->loginRedirect);
        }        
        if ($this->request->data && ($this->request->is('post') || $this->request->is('put'))) {
            if ($this->Locker->login()){
                $_SESSION['KCEDITOR']['disabled']=false;
                if($this->Session->read('Painel.redirect')) $this->redirect($this->Session->read('Painel.redirect'));
                else $this->redirect($this->Locker->loginRedirect);
            } else {
                $this->set('message', $this->Locker->message);
            }
        }
    }
    
    public function recover(){
        $this->layout = false;
        if ($this->request->data && ($this->request->is('post') || $this->request->is('put'))) {
            $email = $this->request->data['User']['email'];
            $user = $this->User->find('first',array('conditions'=>array('User.email'=>$email)));
            if (count($user) > 0){
                $date = date('d/m/Y H:m:s');
                $newpasswd = md5($date.$email);
                $hashpasswd = Security::hash($newpasswd, NULL, true);
                $this->User->data = $user;
                $this->User->data['User']['password'] = $hashpasswd;
                $user = $this->User->data;
                if($this->User->save($this->User->data)){
                    App::uses('CakeEmail','Network/Email');
                    $mail=new CakeEmail('smtp');
                    $mail->template('Painel.recover');
                    $mail->to($user['User']['email']);
                    $mail->emailFormat('html');
                    $mail->subject("Nova senha - $date");
                    $mail->viewVars(array('data'=> $user['User']));
                    $mail->send();
                    echo '<script type="text/javascript">';
                    echo 'alert("Nova senha enviada para o e-mail cadastrado.");';
                    echo 'window.location.href="'.$this->base.'/admin";';
                    echo '</script>';
                    exit;
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Erro! Tente novamente mais tarde.");';
                    echo 'window.location.href="'.$this->base.'/admin";';
                    echo '</script>';
                    exit;
                }
            } else {
                $this->set('message','E-mail não cadastrado.');
            }
        }
    }
    
    public function admin_logout() {
        $this->autoRender = false;
        if($this->Session->check('Auth')){
            $this->Session->delete('Auth');
        }
        $this->redirect('/admin');
    }
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->paginate['order']='User.active ASC, User.username DESC';
        $this->paginate['limit']=60;
//        $this->paginate['conditions']=array('Activate.user_id IS NULL');
        $users = $this->paginate('User');
        $this->set('title','Usuários cadastrados');
        $this->set('groups',$this->Locker->config->groups);
        $this->set(compact('users'));
    }
    
    public function admin_filter($group){
        if(!isset($this->Locker->config->groups[$group]['name'])){
            $this->redirect(array('action'=>'index'));
        }
        $group_name = $this->Locker->config->groups[$group]['name'];
        $this->layout="Painel.admin";
        $this->view='admin_index';
        $this->paginate['order']='User.active ASC, User.username DESC';
        $this->paginate['limit']=20;
        $this->paginate['conditions']=array(
            'Activate.user_id IS NULL',
            'group'=>$group,
         );
        $users = $this->paginate('User');
        $this->set('title','Grupo de usuários: '.$group_name);
        $this->set('groups',$this->Locker->config->groups);
        $this->set(compact('users','group_name'));
    }
    
    public function admin_inactive($id=null){        
        if($id){
            if($this->Activate->deleteAll(array('user_id'=>$id))){
                $this->redirect(env('HTTP_REFERER'));
            }
        }        
        $this->layout="Painel.admin";
        $this->paginate['limit']=20;
        $this->paginate['conditions']=array('Activate.user_id IS NOT NULL');
        $users=$this->paginate('User');
        $this->set('title','Usuários inativos');
        $this->set(compact('users'));
    }
    
    public function admin_blocked($id=null){
        $this->layout="Painel.admin";
        $this->view="admin_index";
        $this->paginate['limit']=20;
        $this->paginate['conditions']=array('User.active = 0');
        $users=$this->paginate('User');
        $this->set('title','Usuários bloqueados');
        $this->set(compact('users'));
    }
    
    public function admin_add() {
        $this->layout = "Painel.admin";
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            
            if($this->data['User']['id'] === ''){
                $count_mail = $this->User->find('count',array('conditions' => array('OR' => array(
                                                                                            'User.email'=>$this->data['User']['email'],
                                                                                            'User.username'=>$this->data['User']['email']
                                                                                    ))));
                if($count_mail > 0){
                    $this->Menssage->message_empty('ATENÇÃO: E-mail já cadastrado.');
                }
            }
            
//            $this->request->data['User']['username'] = $this->data['User']['email'];
            
            if(isset($this->data['User']['password']) && $this->data['User']['password'] === ''){
                unset($this->request->data['User']['password']);
                unset($this->request->data['User']['password_retype']);
            }

            if($this->User->save($this->request->data)){
                $this->redirect(array('action'=>'admin_index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = "Painel.admin";
        $this->data = $this->User->read('*',$id);        
    }
    
    public function admin_delete($id){
        if($this->Locker->user('id')==$id){
            header('Content-Type: text/html; charset=utf-8;');
            $this->Locker->alert(__('Você não pode excluir seu próprio usuário'));
            $this->Locker->js_redirect(env('HTTP_REFERER'));
            exit;
        }
        $this->autoRender=false;
        if($this->User->delete($id)){
            $this->Activate->deleteAll(array('user_id'=>$id));
            $this->redirect(env('HTTP_REFERER'));
        }
    }
    
    public function admin_activate($id){
        if($this->Locker->user('id')==$id){
            header('Content-Type: text/html; charset=utf-8;');
            $this->Locker->alert(__('Você não pode bloquear seu próprio usuário'));
            $this->Locker->js_redirect(env('HTTP_REFERER'));
            exit;
        }
        $this->autoRender=false;
        $this->User->recursive=-1;
        $user=$this->User->read(array('active'),$id);
        $act=$user['User']['active']?0:1;
        $this->User->save(array('id'=>$id,'active'=>$act,));
        $this->redirect(env('HTTP_REFERER'));
    }
    
    public function admin_data(){
//        pre($this->User->validate);
    }
    
    public function admin_password(){
        $this->layout="Painel.admin";
        $this->User->recursive=-1;
        unset($this->User->validate['username'],$this->User->validate['email'],$this->User->validate['name']);
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->User->change_password($this->request->data)){
                $this->set('message','Nova senha salva com sucesso.');
//                pre('eedddi 1818');
//                echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
//                echo '<script type="text/javascript">';
//                echo 'alert("Nova senha salva com sucesso!");';
//                echo 'history.go(-1);';
//                echo '</script>';
//                exit;
//                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    
    public function admin_changepass($id = null){
        $this->layout = 'Painel.admin';
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            
            if($this->data['User']['password_new'] === '' || $this->data['User']['password_retype'] === ''){
                $this->message_empty("ATENÇÃO: Preencha os campos."); 
            }
            
            $count_pass = strlen($this->data['User']['password_new']);
            if($count_pass < 5){
                $this->message_empty('ATENÇÃO: Senha deve conter no mínimo 5 caracteres.'); 
            }
            
            if($this->data['User']['password_new'] !== $this->data['User']['password_retype']){
                $this->message_empty("ATENÇÃO: As senhas digitadas não conferem."); 
            }
            
//            $new_pass = Security::hash($this->data['User']['password_new'], NULL, true);
            
            $userNP['User'] = array(
                                'id' => $this->data['User']['id'],
                                'password' => $this->data['User']['password_new'],
                            );
            
            if($this->User->save($userNP)){
                $this->redirect(array('action'=>'admin_index'));
            }
        }
        $user = $this->User->find('first',array('conditions'=>array('User.id'=>$id)));
        $this->set('user',$user);
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