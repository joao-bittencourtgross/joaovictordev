<?PHP
class NoticiasController extends NoticiasAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function index__(){        
        $this->Seo->title('Notícias');
        $this->paginate['limit'] = 15;
        $this->paginate['order'] = array('Noticia.created' => 'DESC');
        if(isset($this->params->page)){ 
            $this->paginate['page'] = $this->params->page;   
        }
        $posts = $this->paginate('Noticia');
        $this->set('posts',$posts);
    }
    
    public function view(){
        $slug = $this->params->slug;
        $post = $this->Noticia->find('first',array("conditions"=>array("Noticia.slug"=>$slug)));
        
        $this->Seo->title($post['Noticia']['title']);
        $this->set('og_title',$post['Noticia']['title']); 
        if($post['Noticia']['texto']){
            $description = strip_tags($post['Noticia']['texto']);
            $description = substr(html_entity_decode($description), 0, 166).'...';
            $this->Seo->description($description);
            $this->set('og_description',$description); 
        }
        if($post['Noticia']['imagem']){
            $this->set('og_image',$post['Noticia']['imagem']); 
        }
        $this->set('post',$post);
        
        $outras = $this->Noticia->find('all',array('conditions'=>array('Noticia.id != "'.$post['Noticia']['id'].'"'),'order'=>'RAND()','limit'=>3));
        $this->set('outras',$outras);
    }
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Noticia.created' => 'DESC');
        $posts = $this->paginate('Noticia');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
//            unset($this->request->data['Noticia']['id']);
            
            if($this->Noticia->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Noticia->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Noticia->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
}