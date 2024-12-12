<?PHP
class SeoConfig extends SeoAppModel{
    
    public $validate=array(
        'title'=>array(
            array('rule'=>'notBlank','message'=>'Por favor preencha este campo'),
            array('rule'=>array('maxLength',255),'message'=>'Digite no máximo 255 caracteres'),
        ),
        'description'=>array(
            array('rule'=>'notBlank','message'=>'Por favor preencha este campo'),
            array('rule'=>array('maxLength',160),'message'=>'Digite no máximo 160 caracteres'),
        )
    );
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $this->query("DELETE FROM ".$this->tablePrefix.$this->useTable);
    }
    
}