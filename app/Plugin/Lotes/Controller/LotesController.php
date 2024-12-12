<?PHP

class LotesController extends LotesAppController {
    
    public $components = array('Help');
    public $paginate = array('limit'=>16,'order'=>array('created'=>'DESC'));
    
    public function index(){
        $this->layout = 'lotes';
        $this->Seo->title('Mapa dos Lotes');
        $open_lote = '';
//        $this->Session->delete('SessaoLote');
        
        if(isset($_GET['eduardo'])){
            $session_id = $this->create_session();
            $this->Session->write('SessaoLote',$session_id);
        }
        
        $categorias = $this->CategoriaLote->find('all',array('order'=>array('CategoriaLote.order_registro'=>'ASC','CategoriaLote.created'=>'DESC')));
        $lotes = $this->Lote->find('all',array(
            'conditions' => array('Lote.ativo'=>'1')
        ));
//        pre($lotes);
        
        $areas = '[';
        foreach ($lotes as $lote) {
            $cor =  substr($lote['CategoriaLote']['cor'], 1);
//            pre($cor);
            $areas .= '{';
            $areas .= 'key: "'.$lote['Lote']['slug'].'",';
            $areas .= 'isDeselectable: false,';
            $areas .= 'selected: true,';
            $areas .= 'fillColor: "'.$cor.'",';
            $areas .= '},';
        }
        $areas = rtrim($areas,',');
        $areas .= ']';
//        pre($areas);
        
        if(isset($this->params->slug)){
            $open_lote = $this->Lote->find('first',array('conditions'=>array('Lote.slug'=>$this->params->slug,'Lote.ativo'=>'1')));
        }
        
        $this->set('categorias',$categorias);
        $this->set('lotes',$lotes);
        $this->set('areas',$areas);
        $this->set('open_lote',$open_lote);
        
//        $this->set('og_description','Paraiso tropical.');
//        $this->set('og_image','img/thumb-mapa.jpg');
    }

    public function mapalote(){
        $this->autoRender = true;
        $this->layout = false;
        $this->redirect(array('plugin'=>'lotes','controller'=>'lotes','action'=>'index'));
    }
    
    public function ajax_lote(){
        if($this->data && $this->request->is('post')){
//            pre($this->data);
            $lote = $this->Lote->find('first',array('conditions'=>array('Lote.id'=>$this->data['ContatoLote']['lote_id'],'Lote.ativo'=>'1')));
            if($this->ContatoLote->save($this->data)){
                if(!$this->Session->check('SessaoLote')){
                    $session_id = $this->create_session();
                    $this->Session->write('SessaoLote',$session_id);
                }
                $this->redirect(array('plugin'=>'lotes','controller'=>'lotes','action'=>'index','slug'=>$lote['Lote']['slug'],'?'=>array('modal'=>'open')));
            }else{
                $this->message_empty('ERRO: Não foi possível enviar seus dados, tente novamente mais tarde'); 
            }
        }else{
            $this->autoRender = true;
            $this->layout = false;
        
            $lote = $this->Lote->find('first',array(
                'conditions' => array('Lote.slug'=>$this->params->slug, 'Lote.ativo'=>'1')
            ));

            if($lote){
                $this->set('lote',$lote);
            }
        }
    }
    
    public function ajax_lote_bella_vita(){
        $this->autoRender = true;
        $this->layout = false;

        $lote = $this->Lote->find('first',array(
            'conditions' => array('Lote.slug'=>$this->params->slug, 'Lote.ativo'=>'1')
        ));

        if($lote){
            $this->set('lote',$lote);
        }
    }

    public function create_session(){
        $novo_valor = date('dmY');
        $valor = "abcdefghijklmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        for ($i = 0; $i < 18; $i++){
            $novo_valor .= $valor[rand()%strlen($valor)];
        }
        $novo_valor .= date('His');
        return strtoupper($novo_valor);
    }
    
    public function admin_index(){
        $this->layout = 'Painel.admin';
        $this->paginate['limit'] = 155;
        $this->paginate['order'] = array('Lote.order_registro'=>'ASC', 'Lote.created'=>'DESC');
        $posts = $this->paginate('Lote');
        $this->set('posts',$posts);
    }
    
    public function admin_add(){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
          
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            
//            $this->request->data['Lote']['valor'] = $this->Help->change_save_value($this->data['Lote']['valor']);
            
            if($this->Lote->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
        
        $select_categoria[''] = 'Selecione o Status';
        $select_categoria[] = $this->CategoriaLote->find('list',array('fields'=>array('id','title'),'order'=>array('CategoriaLote.order_registro'=>'ASC','CategoriaLote.created'=>'DESC')));
        $this->set('select_categoria',$select_categoria);
    }
    
    public function admin_edit($id){
        $this->layout = 'Painel.admin';
        $this->view = 'admin_editor';
        $registro = $this->Lote->read('*',$id); 
        
        $select_categoria[''] = 'Selecione o Status';
        $select_categoria[] = $this->CategoriaLote->find('list',array('fields'=>array('id','title'),'order'=>array('CategoriaLote.order_registro'=>'ASC','CategoriaLote.created'=>'DESC')));
        $this->set('select_categoria',$select_categoria);
        
//        if($registro['Lote']['valor']){
//            $registro['Lote']['valor'] = number_format($registro['Lote']['valor'], 2, ',', '.');
//        }
        
        $this->data = $registro; 
    }
    
    public function admin_delete($id){
        $this->autoRender = false;
        if($this->Lote->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }   
    
    public function admin_order($id,$order){
        $this->autoRender = false;
        $this->Lote->query('UPDATE tb_lotes SET order_registro = "'.$order.'" WHERE id = "'.$id.'";');
    }
    
    public function bella_vita_redirect(){
        $this->redirect('https://bellacasaeokada.com.br/empreendimentos/cascavel-pr/loteamento-bella-vita');
    }
    
    public function bella_vita(){
        $this->layout = 'lotes';
        $this->Seo->title('Loteamento Bella Vita');
        $open_lote = '';
//        $this->Session->delete('SessaoLote');
        
        if(isset($_GET['eduardo'])){
            $session_id = $this->create_session();
            $this->Session->write('SessaoLote',$session_id);
        }
        
        $categorias = $this->CategoriaLote->find('all',array('order'=>array('CategoriaLote.order_registro'=>'ASC','CategoriaLote.created'=>'DESC')));
        $lotes = $this->Lote->find('all',array(
            'conditions' => array('Lote.ativo'=>'1')
        ));
//        pre($lotes);
        
        $areas = '[';
        foreach ($lotes as $lote) {
            $cor =  substr($lote['CategoriaLote']['cor'], 1);
//            pre($cor);
            $areas .= '{';
            $areas .= 'key: "'.$lote['Lote']['slug'].'",';
            $areas .= 'isDeselectable: false,';
            $areas .= 'selected: true,';
//            $areas .= 'shape: "circle",';
            $areas .= 'fillColor: "'.$cor.'",';
            $areas .= '},';
        }
        $areas = rtrim($areas,',');
        $areas .= ']';
//        pre($areas);
        
        if(isset($this->params->slug)){
            $open_lote = $this->Lote->find('first',array('conditions'=>array('Lote.slug'=>$this->params->slug,'Lote.ativo'=>'1')));
        }
        
        $this->set('categorias',$categorias);
        $this->set('lotes',$lotes);
        $this->set('areas',$areas);
        $this->set('open_lote',$open_lote);
    }
    
}