<?PHP
class SubitemHelper extends AppHelper{
    
    public $helpers=array('Html');
    ###################################################################################################################################################
    public function generateMenu($items,$url,$options=array()){
        if(!isset($options['subkey'])) $options['subkey']='Subitem';
        if(!isset($options['parentkey'])) $options['parentkey']='Parents';
        if(!isset($options['param'])) $options['param']='id';
        return $this->loop($items,$url,$options);
    }
    ###################################################################################################################################################
    private function loop($nodes,$url,$options){
        $urltemp=$url;
        $construct=array();
        $subkey=$options['subkey'];
        $parentkey=$options['parentkey'];
        $param=$options['param'];
        foreach($nodes as $node):
            $info=$node[key($node)];
            $urltemp[$param]=$info[$param];
            $link=$this->Html->link($info['title'],$urltemp);
            if(count($node[$subkey])){
                $link.=$this->loop($node[$subkey], $url, $options);
            }
            $construct[]=$this->Html->tag('li',$link,array('escape'=>false));
        endforeach;
        return $this->Html->tag('ul',implode("\n",$construct),array('escape'=>false));
    }
    ###################################################################################################################################################
}
