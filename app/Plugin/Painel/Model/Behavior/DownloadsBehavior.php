<?PHP
class DownloadsBehavior extends ModelBehavior{
    
    ####################################################################################################################################
    public function afterSave(Model $model,$created){
        parent::afterSave($model,$created);
        if(isset($model->data['Download']) && isset($model->id)){
            $downloads=&$model->data['Download'];
            $order=0;
            foreach($downloads as $k=>$v){
                $downloads[$k]['reference_id']=$model->id;
                $downloads[$k]['order']=$order;
                $order++;
            }
            ClassRegistry::init('Painel.Download')->saveAll($downloads);
        }
    }    
    ####################################################################################################################################
    public function afterFind(Model $model,$results,$primary=false){
        parent::afterFind($model,$results,$primary);
        foreach($results as $k=>$v){
            if(isset($v[$model->alias]['id']) && !empty($v[$model->alias]['id'])){
                $downloads=ClassRegistry::init('Painel.Download')->find('all',array(
                    'order'=>'Download.id DESC',
                    'conditions'=>array(
                        'Download.reference_id'=>$v[$model->alias]['id'],
                    ),
                    'order'=>'Download.order ASC',
                ));
                foreach($downloads as $s=>$n){
                    $downloads[$s]=array_shift($n);
                    $downloads[$s]['download']='/download/'.  str_replace(DS, '/', $downloads[$s]['path']);
                }
                $results[$k]['Download']=$downloads;
            }
        }
        //pre($results);
        return $results;
    }
}