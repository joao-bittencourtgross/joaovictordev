<?PHP
class CategoriaEmpresa extends EmpresasAppModel{

    var $useTable = 'empresas_categorias';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(CategoriaEmpresa.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(CategoriaEmpresa.modified,'%d/%m/%Y')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Slug'=>array('title'=>'slug'),
    );
    
    public $hasMany = array(
        'Empresa' => array(
            'className'  => 'Empresas.Empresa',
            'foreignKey' => 'categoria_id',
            'fields'     => array('id','categoria_id','title','imagem','slug','link_site'),
            'order'      => array('Empresa.order_registro'=>'ASC','Empresa.created'=>'DESC')
        ),
    );
    
}