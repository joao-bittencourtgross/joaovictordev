<?php
class FormulariosBehavior extends ModelBehavior{
    
    ############################################################################################################################|
    public function beforeFind(Model $model,$query){        
        return $query;        
        $model->bindModel(array(
            'hasMany'=>array(
                'Formulario'=>array(
                    'className'=>'Painel.Formulario',
                    'foreignKey'=>'page_id',
                    'order'=>'order ASC',
                ),
            ),
        ));        
        return $query;
    }
    ############################################################################################################################|
    public function afterSave(Model $model,$created){
        parent::afterSave($model,$created);
        if(isset($model->data['Formulario'])){
            $formulario=&$model->data['Formulario'];
            $order=0;
            foreach($formulario as $k=>$v){
                $formulario[$k]['page_id']=$model->id;
            }
            ClassRegistry::init('Painel.Formulario')->saveAll($formulario);
        }
    }
    ############################################################################################################################|
    public function afterFind(Model $model,$results=array(),$primary=false){
        foreach($results as $k=>$v){
            if(!isset($v[$model->alias])) continue;
            if(!isset($v[$model->alias]['id'])) continue;
            $id=$v[$model->alias]['id'];
            $formularios=$model->query("SELECT DISTINCT formulario FROM pnn_formularios WHERE page_id='$id'");
            $results[$k]['Formularios']=array();
            foreach($formularios as $gal){
                @$gal= array_shift(array_shift($gal));
                $results[$k]['Formularios'][$gal]=ClassRegistry::init('Painel.Formulario')->find('all',array('order'=>'Formulario.order ASC, Formulario.id ASC','conditions'=>array(
                    'page_id'=>$id,
                    'formulario'=>$gal,
                )));
                foreach($results[$k]['Formularios'][$gal] as $r=>$s){
                    $results[$k]['Formularios'][$gal][$r]=array_shift($s);
                }
            }
        }
        return $results;        
    }
    ############################################################################################################################|
    public function afterDelete(Model $model){
        parent::afterDelete($model);
        if(isset($model->id) && !empty($model->id)){
            $images=ClassRegistry::init('Painel.Formulario')->find('all',array('conditions'=>array('page_id'=>$model->id)));
            foreach($images as $image){
                if(file_exists($image['Formulario']['path'])) @unlink($image['Formulario']['path']);
            }
            ClassRegistry::init('Painel.Formulario')->deleteAll(array('page_id'=>$model->id));
        }
    }
}