<?PHP
class Unidade extends UnidadesAppModel{
    
    var $useTable = 'unidades';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Unidade.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Unidade.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
}