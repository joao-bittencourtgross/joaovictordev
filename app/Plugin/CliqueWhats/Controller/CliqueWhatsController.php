<?PHP
class CliqueWhatsController extends CliqueWhatsAppController{
    
    public $components = array('Help');
    public $paginate = array('limit'=>44,'order'=>array('CliqueWhat.created'=>'DESC'));
    
    public function index(){
        $this->autoRender = true;
        $this->layout = false;
        
        $informacao = $this->Informacao->find('first');
        $numero = str_replace(array('(',')',' ','-'),'',$informacao['Informacao']['numero_whats']);
        
        $whatsapp['CliqueWhats'] = array('id'=>'', 'ip'=>$this->Help->get_ip(), 'plataforma'=>$this->Help->save_platform());
        
        if($this->CliqueWhats->save($whatsapp)){
            if($this->Help->is_mobile()){
                $this->redirect('https://api.whatsapp.com/send?phone=55'.$numero.'&text='.$informacao['Informacao']['texto_whats']);
            }else{
                $this->redirect('https://web.whatsapp.com/send?phone=55'.$numero.'&text='.$informacao['Informacao']['texto_whats']);
            }
        }
    }
    
    public function redirect_sociais(){
        $this->autoRender = true;
        $this->layout = false;
        
        $tipo = array('facebook'=>'Facebook', 'instagram'=>'Instagram', 'youtube'=>'Youtube', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin', 'tiktok'=>'TikTok', 'github'=>'GitHub');
        
        if($this->params->slug && isset($tipo[$this->params->slug])){
            $informacao = $this->Informacao->find('first');
            
            
            if($informacao['Informacao'][$this->params->slug]){
                $save_social['CliqueSocial'] = array(
                    'id'   => '',
                    'tipo' => $this->params->slug,
                    'ip'   => $this->Help->get_ip(),
                );

                if($this->CliqueSocial->save($save_social)){
                    $this->redirect($informacao['Informacao'][$this->params->slug]);
                }
            }else{
                echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <script> window.close(); </script>';
                exit;
            }
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <script> window.close(); </script>';
            exit; 
        }
    }
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['order'] = array('CliqueWhats.created'=>'DESC');
        $posts = $this->paginate('CliqueWhats');
        
        $cidades = $this->Help->arr_cidade_uf();
        $this->set('cidades',$cidades);
        
        $this->set('posts',$posts);
        $this->set('total',$this->CliqueWhats->find('count'));
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->CliqueWhats->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
}