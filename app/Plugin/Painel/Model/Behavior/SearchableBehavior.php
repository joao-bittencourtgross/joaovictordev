<?PHP
class SearchableBehavior extends ModelBehavior{
    
    public $config;
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        $this->config=$config;
    }
    
    public function search(Model $model,$string){        
        if(!isset($string) || $string=="") $string="NOT SEARCHABLE";
        $matches=$this->get_words($string);
        foreach($this->config as $field){
            foreach($matches as $word){
                if($word[0] == '"') $word=  substr($word, 1);
                if($word[strlen($word)-1] == '"') $word=  substr ($word, 0, strlen($word)-1);
                $or[]=array("$model->alias.$field LIKE"=>"%$word%");
            }
        }
        return $model->find('all',array('conditions'=>array('OR'=>$or)));
    }
    
    public function highlight(Model $model,$string){        
        $words=$this->get_words($string);
        $results=$this->search($model, $string);        
        foreach($results as $k=>$v){
            foreach($this->config as $c){
                foreach($words as $w){
                    $r=&$results[$k][$model->alias][$c];
                    $r=  str_replace($w, '<span class="highlight">'.$w.'</span>', $r);
                }
            }
        }
        return $results;
    }
    
    private function get_words($from){
         preg_match_all("/\"([\w\d\s])+\"|([\w\d])+/u", $from, $matches);
        $matches=array_shift($matches);
        foreach($matches as $k=>$v){
            $r=&$matches[$k];
            if($r[0] == '"') $r=  substr($r, 1);
            if($r[strlen($r)-1] == '"') $r=  substr ($r, 0, strlen($r)-1);
        }
        return $matches;
    }
}