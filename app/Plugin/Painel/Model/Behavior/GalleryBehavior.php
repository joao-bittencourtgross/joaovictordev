<?php
class GalleryBehavior extends ModelBehavior{
    
    ############################################################################################################################|
    public function beforeFind(Model $model,$query){        
        return $query;        
        $model->bindModel(array(
            'hasMany'=>array(
                'Gallery'=>array(
                    'className'=>'Painel.Gallery',
                    'foreignKey'=>'reference_id',
                    'order'=>'order ASC',
                ),
            ),
        ));        
        return $query;
    }
    ############################################################################################################################|
    public function afterSave(Model $model, $created, $options = array()){
        parent::afterSave($model,$created);
        if(isset($model->data['Gallery'])){
            $gallery=&$model->data['Gallery'];
            $order=0;
            foreach($gallery as $k=>$v){
                $gallery[$k]['reference_id']=$model->id;
            }
            ClassRegistry::init('Painel.Gallery')->saveAll($gallery);
        }
    }
    ############################################################################################################################|
    public function afterFind(Model $model,$results=array(),$primary=false){
        foreach($results as $k=>$v){
            if(!isset($v[$model->alias])) continue;
            if(!isset($v[$model->alias]['id'])) continue;
            $id=$v[$model->alias]['id'];
            $galleries=$model->query("SELECT DISTINCT gallery FROM pnn_galleries WHERE reference_id='$id'");
            $results[$k]['Galleries']=array();
            foreach($galleries as $gal){
                @$gal= array_shift(array_shift($gal));
                $results[$k]['Galleries'][$gal]=ClassRegistry::init('Painel.Gallery')->find('all',array('order'=>'Gallery.order ASC, Gallery.id ASC','conditions'=>array(
                    'reference_id'=>$id,
                    'gallery'=>$gal,
                )));
                foreach($results[$k]['Galleries'][$gal] as $r=>$s){
                    $results[$k]['Galleries'][$gal][$r]=array_shift($s);
                }
            }
        }
        return $results;        
    }
    ############################################################################################################################|
    public function afterDelete(Model $model){
        parent::afterDelete($model);
        if(isset($model->id) && !empty($model->id)){
            $images=ClassRegistry::init('Painel.Gallery')->find('all',array('conditions'=>array('reference_id'=>$model->id)));
            foreach($images as $image){
                if(file_exists($image['Gallery']['path'])) @unlink($image['Gallery']['path']);
            }
            ClassRegistry::init('Painel.Gallery')->deleteAll(array('reference_id'=>$model->id));
        }
    }
}