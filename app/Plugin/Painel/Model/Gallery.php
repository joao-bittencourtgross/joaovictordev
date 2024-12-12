<?PHP
class Gallery extends PainelAppModel{
    
    public $useTable='galleries';
    public $temp;
    
    public $virtualFields=array(
        'fullPath'=>"CONCAT('/',path)",
    );
    
    public function beforeDelete($cascade=true){
        parent::beforeDelete($cascade);
        $this->temp=$this->read(array('path'),$this->id);
    }


    public function afterDelete(){
        @unlink($this->temp['Gallery']['path']);
    }
}