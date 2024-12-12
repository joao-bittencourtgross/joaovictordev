<?PHP
class EmprendimentosController extends EmprendimentosAppController{
    
    public $components = array('Painel.Uploading');
    public $paginate = array('limit'=>20,'order'=>array('created'=>'DESC'));
    
    public function index(){        
        $this->Seo->title('Empreendimentos');
        

//        if($this->params->slug){
//            $cidade = $this->Cidade->find('first',array('conditions'=>array('Cidade.slug'=>$this->params->slug)));
//            $emprendimentos = $this->Emprendimento->find('all',array(
//                'conditions' => array('Emprendimento.cidade_id' => $cidade['Cidade']['id']),
//                'order'      => array('Emprendimento.order_registro' => 'ASC', 'Emprendimento.created' => 'DESC'),
//            ));
//        }else{
//            $emprendimentos = $this->Emprendimento->find('all',array('order' => array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')));
//        }
        
        $destaques = $this->Emprendimento->find('all',array(
            'conditions' => array('Emprendimento.ativo' => '1'),
            'order'      => array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC')
        ));
        
        $this->Cidade->recursive = -1;
        $cidades = $this->Cidade->find('all',array('order'=>array('Cidade.order_registro'=>'ASC','Cidade.created'=>'DESC')));
        $cidade_first = $cidades[0];
//        pre($cidade_first);
        
        $emprendimentos = $this->Emprendimento->find('all',array(
            'conditions' => array('Emprendimento.cidade_id' => $cidade_first['Cidade']['id']),
            'order'      => array('Emprendimento.order_registro' => 'ASC', 'Emprendimento.created' => 'DESC'),
        ));
//        pre($emprendimentos);
        
        $this->set('destaques',$destaques);
        $this->set('cidades',$cidades);
        $this->set('cidade_first',$cidade_first);
        $this->set('emprendimentos',$emprendimentos);
    }
    
    public function load_emps(){
        $this->autoRender = true;
        $this->layout = false;
        
        $this->Cidade->recursive = -1;
        $cidade = $this->Cidade->find('first',array(
            'conditions' => array('Cidade.slug'=>$_GET['cidade'])
        ));
//        pre($cidade);
        
        $emprendimentos = $this->Emprendimento->find('all',array(
            'conditions' => array('Emprendimento.cidade_id' => $cidade['Cidade']['id']),
            'order'      => array('Emprendimento.order_registro' => 'ASC', 'Emprendimento.created' => 'DESC'),
        ));
        
        $this->set('emps',$emprendimentos);
    }
    
    public function view(){
        $slug = $this->params->slug;
       // $slug = $this->params->emp;
        $post = $this->Emprendimento->find('first',array('conditions'=>array('Emprendimento.slug'=>$slug)));
        
        $this->Seo->title($post['Emprendimento']['title']);
        $this->set('og_title',$post['Emprendimento']['title']); 
        
      //  $palavras_chave = $this->palavras_chave_para_keyworkd($post);
     //   if($palavras_chave){
       //     $this->Seo->keywords($palavras_chave);
      //  }
            
      //  if($post['Emprendimento']['seo_descricao']){
         //   $this->Seo->description($post['Emprendimento']['seo_descricao']);
         //   $this->set('og_description',$post['Emprendimento']['seo_descricao']); 
      //  }
        
       // if($post['Emprendimento']['img_whatsapp']){
       //     $this->set('og_image',$post['Emprendimento']['img_whatsapp']); 
      //  }
        
        $diferenciais = $this->DiferencialEmp->find('all',array(
            'conditions' => array('DiferencialEmp.empreendimento_id'=>$post['Emprendimento']['id']),
            'order'      => array('DiferencialEmp.order_registro'=>'ASC', 'DiferencialEmp.created'=>'DESC')
        ));
        
      // $locais = $this->LocalEmp->find('all',array(
         //   'conditions' => array('LocalEmp.empreendimento_id'=>$post['Emprendimento']['id']),
       //     'order'      => array('LocalEmp.order_registro'=>'ASC', 'LocalEmp.created'=>'DESC')
      //  ));
        
        $progressos = $this->ProgressoEmp->find('all',array(
            'conditions' => array('ProgressoEmp.empreendimento_id'=>$post['Emprendimento']['id']),
            'order'      => array('ProgressoEmp.order_registro'=>'ASC', 'ProgressoEmp.created'=>'DESC')
        ));
//        pre($progressos);
        
        $this->set('post',$post);
        $this->set('diferenciais',$diferenciais);
      //  $this->set('locais',$locais);
        $this->set('progressos',$progressos);
//        $this->set('diferenciais',$diferenciais);
    }
    
    public function palavras_chave_para_keyworkd($post){
        if($post['Emprendimento']['seo_palavras']){
            $exp_keys = explode(';', $post['Emprendimento']['seo_palavras']);
            $keywords = implode (', ', $exp_keys);
            return $keywords;
        }else{
            return false;
        }
    }
    
    public function admin_index($categoria=null,$tipo=null){
        $this->layout = 'Painel.admin';
        
        $this->paginate['order'] = array('Emprendimento.order_registro'=>'ASC','Emprendimento.created'=>'DESC');
        $posts = $this->paginate('Emprendimento');
        
        $this->set(compact('posts'));
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $cidades[''] = 'Selecione a Cidade';
        $cidades[] = $this->Cidade->find('list',array('fields'=>array('id','title'),'order'=>array('Cidade.order_registro'=>'ASC','Cidade.created'=>'DESC')));
        
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            
            
//            $this->Uploading->allowed = array('pdf','doc','docx','PDF','DOC');
//            if(isset($this->data['Emprendimento']['catalogo_digital']['name']) && $this->data['Emprendimento']['catalogo_digital']['name']){
//                $arquivo = $this->Uploading->send_file('files/catalogo-digital', $this->data['Emprendimento']['catalogo_digital']);
//                if($arquivo){
//                    $this->request->data['Emprendimento']['catalogo_digital'] = $arquivo;
//                }else{
//                    $this->message_empty("ATENÇÃO: Arquivo enviado não é PDF ou DOC."); 
//                }
//                
//            }else{
//                unset($this->request->data['Emprendimento']['catalogo_digital']);
//            }
            
            $this->request->data['Emprendimento']['cidade'] = $cidades[0][$this->data['Emprendimento']['cidade_id']];
            
            if($this->Emprendimento->save($this->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
        
        
        
//        $diferenciais = $this->Diferencial->find('list',array('order'=>array('Diferencial.order_registro'=>'ASC', 'Diferencial.created'=>'DESC'),'fields'=>array('id','title')));
//        pre($diferenciais);
        $this->set('cidades',$cidades);
//        $this->set('diferenciais',$diferenciais);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        
        $cidades[''] = 'Selecione a Cidade';
        $cidades[] = $this->Cidade->find('list',array('fields'=>array('id','title'),'order'=>array('Cidade.order_registro'=>'ASC','Cidade.created'=>'DESC')));
        
//        $diferenciais = $this->Diferencial->find('list',array('order'=>array('Diferencial.order_registro'=>'ASC', 'Diferencial.created'=>'DESC'),'fields'=>array('id','title')));
        
        $this->set('cidades',$cidades);
//        $this->set('diferenciais',$diferenciais);
        
        $registro = $this->Emprendimento->read('*',$id); 
        $this->data = $registro; 
    }
    
    public function admin_remove_catalogo($id){
        $this->autoRender = false;
        $emp = $this->Emprendimento->find('first',array('conditions'=>array('Emprendimento.id'=>$id)));
        if(unlink($emp['Emprendimento']['catalogo_digital'])){
            $save['Emprendimento'] = array('id'=>$id, 'catalogo_digital'=>'');
            if($this->Emprendimento->save($save)){
                $this->redirect(array('action'=>'admin_edit',$id));
            }
        }

    }  
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Emprendimento->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Emprendimento->query('UPDATE tb_emprendimentos SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
    public function load_emp(){
        $this->autoRender = true;
        $this->layout = false;
        
        if($this->params->slug){
            $city = $this->params->slug;
//            pre($this->params->slug);
            $emps = $this->Emprendimento->find('all',array(
                'fields'     => array('cidade','title','imagem_subm','slug','img480','resumo_home','status'),
                'conditions' => array('Emprendimento.cidade'=>$city, 'Emprendimento.ativo'=>'1'),
                'order'      => array('Emprendimento.ano'=>'DESC', 'Emprendimento.created'=>'DESC'),
            ));

            $this->set('emps',$emps);
            $this->set('city',$city);
        }else{
            
        }
        
    }
    
}