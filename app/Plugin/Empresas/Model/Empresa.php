<?PHP
class Empresa extends EmpresasAppModel{
    
    var $useTable = 'empresas';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Empresa.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Empresa.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
//        'Painel.Gallery',
//        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
    );
    
   // public $belongsTo = array(
    //    'CategoriaEmpresa'=>array(
    //        'className'=>'Empresas.CategoriaEmpresa',
    //        'foreignKey'=>'categoria_id'
   //     ),
   // );    
    
}