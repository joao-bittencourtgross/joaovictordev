<?PHP
class VagasController extends VagasAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function index(){     
        $this->layout = false;
        $this->autoRender = false;
        $this->Seo->title('Vagas');
        $this->paginate['limit'] = 15;
        $this->paginate['order'] = array('Vaga.order_registro' => 'ASC', 'Vaga.created' => 'DESC');
        if(isset($this->params->page)){ 
            $this->paginate['page'] = $this->params->page;   
        }
        $posts = $this->paginate('Vaga');
        $this->set('posts',$posts);
    }
    
    public function view(){
        $this->layout = false;
        $this->autoRender = false;
        $slug = $this->params->slug;
        $post = $this->Vaga->find('first',array("conditions"=>array("Vaga.slug"=>$slug)));
        
        $this->Seo->title($post['Vaga']['title']);
        $this->set('og_title',$post['Vaga']['title']); 
        if($post['Vaga']['texto']){
            $description = strip_tags($post['Vaga']['texto']);
            $description = substr(html_entity_decode($description), 0, 166).'...';
            $this->Seo->description($description);
            $this->set('og_description',$description); 
        }
        if($post['Vaga']['imagem']){
            $this->set('og_image',$post['Vaga']['imagem']); 
        }
        $this->set('post',$post);
        
        $outras = $this->Vaga->find('all',array('conditions'=>array('Vaga.id != "'.$post['Vaga']['id'].'"'),'order'=>'RAND()','limit'=>3));
        $this->set('outras',$outras);
    }
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Vaga.order_registro'=>'ASC', 'Vaga.created' => 'DESC');
        $posts = $this->paginate('Vaga');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Vaga->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Vaga->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Vaga->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   

    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Vaga->query('UPDATE tb_vagas SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}