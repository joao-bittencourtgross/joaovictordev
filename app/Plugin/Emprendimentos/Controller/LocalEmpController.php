<?PHP
class LocalEmpController extends EmprendimentosAppController {
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($id_emp = null){
        $this->layout = 'Painel.admin';
        
        $value_select = '';
        $select_emps[''] = 'Todos';
        $select_emps[] = $this->Emprendimento->find('list',array('fields'=>array('id','title'),'order'=>array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')));
        
        if($id_emp){
            $this->paginate['conditions'] = array('LocalEmp.empreendimento_id'=>$id_emp);
            $value_select = $id_emp;
        }
        $this->paginate['order'] = array('LocalEmp.order_registro'=>'ASC','LocalEmp.created'=>'DESC');
        $posts = $this->paginate('LocalEmp');
        
        $this->set('value_select',$value_select);
        $this->set('select_emps',$select_emps);
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            
            $this->request->data['LocalEmp']['igm'] = str_replace('width="600" height="450" style="border:0;"', '', $this->data['LocalEmp']['igm']);
          
            if($this->LocalEmp->save($this->request->data)){
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
        
        $registro = $this->LocalEmp->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->LocalEmp->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->LocalEmp->query('UPDATE tb_emp_localidades SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
    public function load_local(){
        $this->autoRender = true;
        $this->layout = false;
        
        if($this->params->slug){
            $local_emp = $this->LocalEmp->find('first',array(
                'fields'     => array('id','title','igm'),
                'conditions' => array('LocalEmp.slug'=>$this->params->slug),
            ));

            $this->set('local_emp',$local_emp);
        }else{
            pre('error');
        }
        
    }
    
}