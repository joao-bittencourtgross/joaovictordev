<?PHP
class FillHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function url($url=null,$width=100,$height=100,$fill="FFFFFF") {
        if($url[0]=='/') $url=substr ($url, 1);
        return "/media/fill/{$width}x{$height}/{$fill}/{$url}";
    }
    
    public function image($url,$width=100,$height=100,$fill="FFFFFF",$options=array()){
        $url=$this->url($url,$width,$height,$fill);
        return $this->Html->image($url,$options);
    }
    
}