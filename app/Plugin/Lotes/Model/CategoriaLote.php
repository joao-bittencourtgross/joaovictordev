<?PHP
class CategoriaLote extends LotesAppModel{

    var $useTable = 'lotes_categoria';
    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(CategoriaLote.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(CategoriaLote.modified,'%d/%m/%Y')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Slug'=>array('title'=>'slug'),
    );
    
//    public $hasMany = array(
//        'Lote' => array(
//            'className'  => 'Lotes.Lote',
//            'foreignKey' => 'categoria_id',
//            'order'      => array('Lote.order_registro'=>'ASC', 'Lote.created'=>'DESC'),
//        ),
//    );
    
}