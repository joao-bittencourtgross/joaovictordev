<?PHP
class DiferencialEmpreendimento extends EmprendimentosAppModel{
    
    var $useTable = 'emp_diferenciais';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(DiferencialEmpreendimento.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(DiferencialEmpreendimento.modified,'%d/%m/%Y %H:%i')",
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