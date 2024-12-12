<?PHP
class Produto extends ProdutosAppModel{

    var $useTable = 'produtos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Produto.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Produto.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'titulo'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('titulo'=>'slug'),
        'Searchable'=>array('titulo','texto')
    );
    
}