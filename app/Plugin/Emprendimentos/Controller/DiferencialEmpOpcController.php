<?PHP
class DiferencialEmpOpcController extends EmprendimentosAppController {
    
    public $paginate = array('limit'=>18,'order'=>array('created'=>'DESC'));
    
    public function admin_index($id_campo){
        $this->layout = 'Painel.admin';

        $campo = $this->DiferencialEmp->find('first',array('conditions'=>array('DiferencialEmp.id'=>$id_campo)));

        $this->paginate['conditions'] = array('DiferencialEmpOpc.campo_id'=>$id_campo);
        $this->paginate['order']      = array('DiferencialEmpOpc.order_registro'=>'ASC','DiferencialEmpOpc.created'=>'DESC');
        
        $posts = $this->paginate('DiferencialEmpOpc');
        
        $this->set('posts',$posts);
        $this->set('campo',$campo);
    }
    
    public function admin_add($id_campo){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){

            if($this->DiferencialEmpOpc->save($this->request->data)){
                $this->redirect(array('plugin'=>'emprendimentos','controller'=>'diferencial_emp_opc','action'=>'index',$id_campo));
            }
        }

        $campo = $this->DiferencialEmp->find('first',array('conditions'=>array('DiferencialEmp.id'=>$id_campo)));
        $this->set('campo',$campo);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $registro = $this->DiferencialEmpOpc->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_delete($id,$id_campo){
        $this->autoRender = false;
        if($this->DiferencialEmpOpc->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->DiferencialEmpOpc->query('UPDATE tb_emp_diferenciais SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
}