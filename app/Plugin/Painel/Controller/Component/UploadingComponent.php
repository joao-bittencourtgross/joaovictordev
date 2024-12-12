<?PHP
class UploadingComponent extends Component {
    
    private $controller;
    public $allowed = array();
    
    public function initialize(Controller $controller){
        $this->controller = $controller;
    }
    
    public function send_file($path,$archive){
        if(!is_array($archive)){
            return false;
        }else{
            if(!empty($this->allowed)){
               if(!$this->allowedExtensions($archive['name'])){
                   return false; 
               }
            }
            if(!file_exists($path)) mkdir($path, 0777, true);
            $filename = $this->fileName($archive['name']);
            $destination = "$path/$filename";
            if(file_exists($destination)){
                $destination = $path.'/'.date('d-m-Y-H-m-s').'_'.$filename;
            } 
            if(!move_uploaded_file($archive['tmp_name'], $destination)){
                return false;
            }else{
                return $destination;
            }
        }
    }
    
    public function allowedExtensions($file){
        if(!empty($this->allowed)){
            if(in_array(strtolower(pathinfo($file,PATHINFO_EXTENSION)),$this->allowed)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    private function fileName($file){
        $ext = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        return str_replace("_$ext","",Inflector::slug(strtolower($file))).".$ext";
    }
            
    
}