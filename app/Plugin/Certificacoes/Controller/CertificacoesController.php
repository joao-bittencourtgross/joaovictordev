<?PHP
class CertificacoesController extends CertificacoesAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function index(){     
        $this->Seo->title('Certificações');
        $this->paginate['limit'] = 15;
        $this->paginate['order'] = array('Certificacao.created' => 'DESC');
        if(isset($this->params->page)){ 
            $this->paginate['page'] = $this->params->page;   
        }
        $posts = $this->paginate('Certificacao');
        $this->set('posts',$posts);
    }
    
    public function view(){
        $this->layout = false;
        $this->autoRender = false;
        $slug = $this->params->slug;
        $post = $this->Certificacao->find('first',array("conditions"=>array("Certificacao.slug"=>$slug)));
        
        $this->Seo->title($post['Certificacao']['title']);
        $this->set('og_title',$post['Certificacao']['title']); 
        if($post['Certificacao']['texto']){
            $description = strip_tags($post['Certificacao']['texto']);
            $description = substr(html_entity_decode($description), 0, 166).'...';
            $this->Seo->description($description);
            $this->set('og_description',$description); 
        }
        if($post['Certificacao']['imagem']){
            $this->set('og_image',$post['Certificacao']['imagem']); 
        }
        $this->set('post',$post);
        
        $outras = $this->Certificacao->find('all',array('conditions'=>array('Certificacao.id != "'.$post['Certificacao']['id'].'"'),'order'=>'RAND()','limit'=>3));
        $this->set('outras',$outras);
    }
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Certificacao.order_registro' => 'ASC','Certificacao.created' => 'DESC');
        $posts = $this->paginate('Certificacao');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Certificacao->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Certificacao->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Certificacao->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }

    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Certificacao->query('UPDATE tb_certificacoes SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
    
}