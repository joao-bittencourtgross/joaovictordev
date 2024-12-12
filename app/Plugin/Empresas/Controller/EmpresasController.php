<?PHP

class EmpresasController extends EmpresasAppController{
    
    public $components = array('Help');
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function index(){  
        $this->Seo->title('Empresas');
     
        $posts = $this->Empresa->find('all',array(
            'order'      => array('Empresa.order_registro'=>'ASC','Empresa.created'=>'DESC')
        ));
        
        $this->set('posts',$posts);
    }
    
    public function view(){
        $post = $this->Empresa->find('first',array('conditions'=>array('Empresa.slug'=>$this->params->slug)));
        
        $this->Seo->title($post['Empresa']['title']);
        $this->set('og_title',$post['Empresa']['title']); 
        $this->set('post',$post);
    }
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Empresa.order_registro'=>'ASC','Empresa.created'=>'DESC');
        $posts = $this->paginate('Empresa');
        
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Empresa->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    
      //  $categorias[''] = 'Selecione uma categoria';
      //  $categorias[] = $this->CategoriaEmpresa->find('list',array('fields'=>array('id','title'),'order'=>array('CategoriaEmpresa.order_registro'=>'ASC', 'CategoriaEmpresa.created'=>'DESC')));
      //  $this->set('categorias',$categorias);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->Empresa->find('first',array('conditions'=>array('Empresa.id'=>$id))); 
        $this->data = $registro; 
        
       // $categorias[''] = 'Selecione uma categoria';
      //  $categorias[] = $this->CategoriaEmpresa->find('list',array('fields'=>array('id','title'),'order'=>array('CategoriaEmpresa.order_registro'=>'ASC', 'CategoriaEmpresa.created'=>'DESC')));
       // $this->set('categorias',$categorias);
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Empresa->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Empresa->query('UPDATE tb_empresas SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}