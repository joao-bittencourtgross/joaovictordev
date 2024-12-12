<?PHP
class SeoHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function afterLayout($layout){
        $plug="";
        if(!empty(SeoComponent::$keywords)) $plug.=$this->Html->meta('keywords',SeoComponent::$keywords)."\n";
        if(!empty(SeoComponent::$description)) $plug.=$this->Html->meta('description',  SeoComponent::$description)."\n";
        if(!empty(SeoComponent::$author)) $plug.='<meta name="author" content="'.SeoComponent::$author.'" />'."\n";
        if(!empty($plug)){
            $this->_View->output=  preg_replace("#<[hH][eE][aA][dD]>#","<head>\n$plug",$this->_View->output);
        }
        if(!empty(SeoComponent::$analytics)){
            $analytics=$this->_View->element('Seo.analytics',array('id'=>  SeoComponent::$analytics));
            $this->_View->output=  preg_replace("#</[bB][oO][dD][yY]>#",$analytics.'</body>',$this->_View->output);
        }
        parent::afterLayout($layout);
    }
}
?>