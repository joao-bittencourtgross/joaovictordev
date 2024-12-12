<?PHP
class InformacaoController extends CliqueWhatsAppController {
    
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            $this->request->data['Informacao']['texto_whats'] = $this->salvar_texto_whatsapp($this->data['Informacao']['texto_whats']);
            if($this->Informacao->save($this->request->data)){
                $this->redirect(array('action'=>'edit'));
            }
        }
    }
    
    public function admin_edit(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $registro = $this->Informacao->find('first');
        
        $registro['Informacao']['texto_whats'] = $this->mostrar_texto_whatsapp($registro['Informacao']['texto_whats']);
        
        $this->data = $registro; 
    }
    
    public function salvar_texto_whatsapp($texto){
        $substitui = array(' ','  ');
        $texto_whats = str_replace($substitui, '%20', $texto);
        return $texto_whats;
    }
    
    public function mostrar_texto_whatsapp($texto){
        $substitui = array('%20');
        $texto_whats = str_replace($substitui, ' ', $texto);
        return $texto_whats;
    }
    
}