<?PHP
class GaleriasController extends EmprendimentosAppController {
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($id_emp = null){
        $this->layout = 'Painel.admin';
        
        $value_select = '';
        $select_emps[''] = 'Todos';
        $select_emps[] = $this->Emprendimento->find('list',array('fields'=>array('id','title'),'order'=>array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')));
        
        if($id_emp){
            $this->paginate['conditions'] = array('Galeria.emp_id'=>$id_emp);
            $value_select = $id_emp;
        }
        $this->paginate['order'] = array('Galeria.order_registro'=>'ASC','Galeria.created'=>'DESC');
        $posts = $this->paginate('Galeria');
        
        $this->set('value_select',$value_select);
        $this->set('select_emps',$select_emps);
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Galeria->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
        
        $emps[''] = 'Selecione o Empreendimento';
        $emps[] = $this->Emprendimento->find('list',array('fields'=>array('id','title'),'order'=>array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')));
        $this->set('emps',$emps);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $emps[''] = 'Selecione o Empreendimento';
        $emps[] = $this->Emprendimento->find('list',array('fields'=>array('id','title'),'order'=>array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')));
        $this->set('emps',$emps);
        
        $registro = $this->Galeria->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Galeria->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Galeria->query('UPDATE tb_galerias_emprendimento SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}