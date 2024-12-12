<?PHP
class DownloadHelper extends AppHelper{
    
    public function url($link,$full=false){
        return $this->url("/download/$link",$full);
    }
    
    public function link($name,$link,$options=array()){
        return $this->Html->link($name,"/download/$link",$options);
    }
    
}