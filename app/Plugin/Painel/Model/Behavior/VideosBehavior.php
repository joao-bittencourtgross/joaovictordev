<?PHP

class VideosBehavior extends ModelBehavior {

    ############################################################################################################################|
    public function beforeFind(Model $model, $query) {
        $model->bindModel(array(
            'hasMany' => array(
                'Video' => array(
                    'className' => 'Painel.Video',
                    'foreignKey' => 'reference_id',
                    'order' => 'Video.order ASC',
                ),
            ),
        ));
        return $query;
    }
    ############################################################################################################################|
    public function afterSave(Model $model, $created, $options = array()) {
        parent::afterSave($model, $created);
        if (isset($model->id) && !empty($model->id)) {
            ClassRegistry::init('Painel.Video')->deleteAll(array('reference_id' => $model->id));
            
            if (isset($model->data['Video']) && !empty($model->data['Video'])) {
                $videos = &$model->data['Video'];
                $order = 0;
                foreach ($videos as $k => $v) {
                    $videos[$k]['reference_id'] = $model->id;
                    $videos[$k]['order'] = $order;
                    $order++;
                }
                ClassRegistry::init('Painel.Video')->deleteAll(array('reference_id' => $model->id));
                ClassRegistry::init('Painel.Video')->saveAll($videos);
            }
        }
    }
    ############################################################################################################################|
    public function afterDelete(Model $model){
        parent::afterDelete($model);
        if(isset($model->id) && !empty($model->id)){
            ClassRegistry::init('Painel.Video')->deleteAll(array('reference_id'=>$model->id));
        }
    }
}