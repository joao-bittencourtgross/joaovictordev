<?PHP
class ProdutosController extends ProdutosAppController{
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function index(){   
        $categoria = $this->params->categoria;  
        $this->Seo->title('Produtos');
        $this->paginate['limit'] = 50;
        if($categoria) {
            $this->paginate['conditions'] = array('Produto.categoria'=>$categoria);
        }
        $this->paginate['order'] = array('Produto.order_registro'=>'ASC', 'Produto.created' => 'DESC');
        if(isset($this->params->page)){ 
            $this->paginate['page'] = $this->params->page;   
        }
        $posts = $this->paginate('Produto');
        $this->set('posts',$posts);
    }
    
    public function view(){
        $slug = $this->params->slug;
        $post = $this->Produto->find('first',array("conditions"=>array("Produto.slug"=>$slug)));
        
        $this->Seo->title($post['Produto']['titulo']);
        $this->set('og_title',$post['Produto']['titulo']); 
        if($post['Produto']['descricao']){
            $description = strip_tags($post['Produto']['descricao']);
            $description = substr(html_entity_decode($description), 0, 166).'...';
            $this->Seo->description($description);
            $this->set('og_description',$description); 
        }
        if($post['Produto']['imagem']){
            $this->set('og_image',$post['Produto']['imagem']); 
        }
        $this->set('post',$post);
        
       // $outras = $this->Produto->find('all',array('conditions'=>array('Produto.id != "'.$post['Produto']['id'].'"'),'order'=>'RAND()','limit'=>3));
       // $this->set('outras',$outras);
    }
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Produto.order_registro'=>'ASC', 'Produto.created' => 'DESC');
        $posts = $this->paginate('Produto');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
//            unset($this->request->data['Produto']['id']);
            
            if($this->Produto->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Produto->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Produto->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   

    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Produto->query('UPDATE tb_produtos SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}