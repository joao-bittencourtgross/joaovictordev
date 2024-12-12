<?PHP
class ConfigController extends PainelAppController{
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $this->set('title','Editando configurações do site');
    }
    
    public function admin_edit(){
        
    }
    
}