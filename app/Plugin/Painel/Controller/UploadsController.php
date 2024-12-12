<?PHP
App::import('Vendor', 'Painel.canvas');
class UploadsController extends PainelAppController{   
    
    public $uses = array(
        'Painel.Gallery',
        'Painel.Download',
        'Painel.Video',
        'Painel.Formulario',
    );
    
    ########################################################################################################################################################
    public function download(){
        $this->autoRender=false;
        $args = func_get_args();
        $path = implode(DS, $args);
        $name = array_pop($args);
        
        $file_name = 'img\cake.icon.png';
        $file_url = Router::url('/',true).'download/img/cake.icon.png';
        if(file_exists($path)){            
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: Binary");
            header('Content-disposition: attachment; filename="'.$name.'"'); 
            echo file_get_contents($path);
        } else {
            throw new NotFoundException('Não existe o arquivo');
        }
    }
    
    ########################################################################################################################################################
    public function admin_single(){
        $this->autoRender=false;
        if(!file_exists('img'.DS.'uploads')) mkdir ('img'.DS.'uploads', 0777, true);
        $reduce=$this->request->params['pass']['0'];
        $extension=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        $destination='img'.DS.'uploads'.DS.uniqid().'.'.$extension;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$destination)){
           
            if($_FILES['file']['type'] !== 'image/png'){
                $canvas = new canvas($destination);
                list($width,$height) = getimagesize($destination);
                if(($width > 1200) && $reduce==='reduce'){
                    $canvas->redimensiona(1200, '','proporcional');
                }
                $canvas->grava($destination,88);
            }
            
            echo json_encode(array(
                'status'=>'ok',
                'path'=>  str_replace('\\', '/', $destination),
            ));
        }
    }     
    ########################################################################################################################################################
    public function admin_multiple(){
        $this->autoRender=false;
        if(!file_exists('img'.DS.'gallery')) mkdir('img'.DS.'gallery');
        $expires = date('Y-m-d H:i:s',strtotime('+2 days'));
        $path='img'.DS.'gallery'.DS. uniqid().'.'.pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
            
            $canvas = new canvas($path);
            list($width,$height) = getimagesize($path);
            if($width > 1200){
                $canvas->redimensiona(1200, '','proporcional');
            }
            $canvas->grava($path,88);
            
            $result = $this->Gallery->save(array(
                'path'=>  str_replace('\\','/', $path),
                'gallery'=>$this->data['gallery'],
                'upload_id'=>$this->data['upload_id'],
                'expires'=>date('Y-m-d H:i:s',strtotime('+2 days')),
            ));
            
            if($result) echo json_encode(array(
                'status'=>'ok',
                'upload_id'=>$this->data['upload_id'],
                'gallery'=>$this->data['gallery'],
                'id'=>$result['Gallery']['id'],
                'path'=>  str_replace ('\\', '/',$result['Gallery']['path']),
                'fullPath'=> '/'.str_replace ('\\', '/',$result['Gallery']['path']),
            ));
            else echo json_encode (array(
                'status'=>'error',
                'upload_id'=>$this->data['upload_id'],
                'gallery'=>$this->data['gallery'],
            ));
        }
    }
    ########################################################################################################################################################
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Gallery->delete($id)){
            echo json_encode(array(
                'status'=>'ok',
            ));
        }
    }
    ########################################################################################################################################################
    public function admin_order(){
        $this->autoRender=false;
        $this->Gallery->save(array(
            'id'=>$_REQUEST['id'],
            'order'=>$_REQUEST['index'],
        ));
        echo json_encode(array('status'=>'ok'));
    }
    ########################################################################################################################################################
    public function admin_file(){
        $this->autoRender=false;
        if(!file_exists('downloads')) mkdir('downloads',0777,true);
        $extension = strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
        $destination='downloads'.DS.uniqid().'.'.$extension;
        $size=intval(($_FILES['file']['size']/1024)).'kb';
                
        if(@move_uploaded_file($_FILES['file']['tmp_name'], $destination)){
            if($this->Download->save(array(
                'path'=>$destination,
                'extension'=>$extension,
                'size'=>$size,
                'name'=>$_FILES['file']['name'],
            ))){
                echo json_encode(array(
                    'status'=>'ok',
                    'path'=>$destination,
                    'extension'=>$extension,
                    'size'=>$size,
                    'id'=>$this->Download->id,
                    'name'=>$_FILES['file']['name'],
                    'expires'=>date('Y-m-d H:i:s',strtotime('+2 days')),
                ));
            } else {
                echo json_encode(array(
                    'status'=>'error',
                    'message'=>__('O upload foi feito, porém não foi possível salvar os dados no banco, contate o administrador'),
                ));
            }
        } else {
            echo json_encode(array(
                'status'=>'error',
                'message'=>__('Por favor verifique o formato do arquivo e/ou o tamanho do mesmo'),
            ));
        }
    }
    ########################################################################################################################################################
    public function admin_filedelete(){
        $this->autoRender=false;
        if(@unlink($this->data['path'])){
            if($this->Download->delete($this->data['id'])){
                echo json_encode(array(
                    'status'=>'ok'
                ));
            } else {
                echo json_encode(array(
                    'status'=>'error',
                    'message'=>"Não foi possível excluir do banco de dados\nContate o administrador",
                ));
            }
        } else {
            echo json_encode(array(
                'status'=>'error',
                'message'=>"Não foi possível excluir o arquivo\nContate o administrador",
            ));
        }
    }
    
    public function register($tela=null){
        if(!$passo) $this->view="inicio";
        else $this->view=$tela;
    }
    
    public function title(){
        $this->autoRender=false;
        if(isset($_GET['id']) && isset($_GET['title']) && $_GET['id']!='' && $_GET['title']!=''){
            $this->Gallery->id=$_GET['id'];
            $this->Gallery->saveField('legend',$_GET['title']);
            echo 'hit';
        }else{
            echo 'miss';
        }
    }
    
    public function admin_delete_img($column,$table,$id){
       $this->autoRender = false;
       if(isset($column) && $column && isset($table) && $table && isset($id) && $id){
            if(isset($_GET['path']) && $_GET['path']){
                $url = $_SERVER['DOCUMENT_ROOT'].$this->base.'/app/webroot/'.$_GET['path'];
                unlink($url);
            }
           
            $this->Gallery->query('UPDATE '.$table.' SET '.$column.' = "" WHERE id = "'.$id.'";');
            $this->redirect($this->referer());
       }
    }
    
}