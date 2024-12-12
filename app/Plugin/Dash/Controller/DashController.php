<?PHP
class DashController extends DashAppController{
    
    public $components = array('Help');
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_index';
        
        
    }
    
    public function not_email_semanal(){
        $this->autoRender = false;
        
        $total = $this->Loja->find('count',array('conditions' => array('Loja.ativa'=>'1', 'Loja.email_s'=>'0')));
        if($total === 0){
            $this->Loja->query('UPDATE tb_lojas SET email_s = "0";');
            echo 'salvo.';
        }
    }
    
    
    
}