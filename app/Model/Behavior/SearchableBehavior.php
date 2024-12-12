<?PHP
class SearchableBehavior extends ModelBehavior{
    
    public $config;
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        $model->SearchableConfig=$config;
    }
    
    public function search(Model $model,$string,$deep=false){
        $this->config=$model->SearchableConfig;
        if(!isset($string) || $string=="") $string="NOT SEARCHABLE";
        $matches=$this->get_words($string);
        foreach($this->config as $field){
            $and=array();
            foreach($matches as $k=>$word){
                if($word[0] == '"') $word=  substr($word, 1);
                if($word[strlen($word)-1] == '"') $word=  substr ($word, 0, strlen($word)-1);
                if($deep){
                    $conditions['OR'][]=array("$model->alias.$field LIKE '%$word%'");
                } else {
                    $and[]="$model->alias.$field LIKE '%$word%'";
                }
            }
            if(!$deep) $conditions['OR'][] = implode(" AND ", $and);
        }
        return $model->find('all',array('conditions'=>$conditions));
    }
    
    public function getSearchConditions(Model $model,$string,$deep=false){
        $this->config=$model->SearchableConfig;
        if(!isset($string) || $string=="") $string="NOT SEARCHABLE";
        $matches=$this->get_words($string);
        foreach($this->config as $field){
            $and=array();
            foreach($matches as $k=>$word){
                if($word[0] == '"') $word=  substr($word, 1);
                if($word[strlen($word)-1] == '"') $word=  substr ($word, 0, strlen($word)-1);
                if($deep){
                    $conditions['OR'][]=array("$model->alias.$field LIKE '%$word%'");
                } else {
                    $and[]="$model->alias.$field LIKE '%$word%'";
                }
            }
            if(!$deep) $conditions['OR'][] = implode(" AND ", $and);
        }
        return $conditions;
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