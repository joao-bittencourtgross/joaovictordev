<?PHP
class SlugBehavior extends ModelBehavior{
    
    public $settings;
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        $this->settings=$config;
    }
    
    public function beforeSave(Model $model, $options = array()) {
        parent::beforeSave($model);
        foreach($this->settings as $k=>$v){
            if(!isset($model->data[$model->name][$k])) continue;
            $model->data[$model->name][$v]=strtolower(Inflector::slug($model->data[$model->name][$k],'-'));
            
            if(isset($model->data[$model->name]['id'])){
                $data=$model->find('first',array(
                    'conditions'=>array(
                        $model->name.'.'.$v=>$model->data[$model->name][$v],
                        $model->name.'.id !='=>$model->data[$model->name]['id'],
                    )
                ));
            }else{
                $data=$model->find('first',array(
                    'conditions'=>array(
                        $model->name.'.'.$v=>$model->data[$model->name][$v],
                    )
                ));
            }
            if(isset($data) && count($data)>0 && !empty($data)){
//                $model->data[$model->name][$v] = uniqid($model->data[$model->name][$v]);
                $model->data[$model->name][$v] = $model->data[$model->name][$v].'-'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            }
        }
        return true;
    }
    
}