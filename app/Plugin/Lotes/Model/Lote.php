<?PHP
class Lote extends LotesAppModel{
    
    var $useTable = 'lotes';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Lote.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Lote.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Slug'=>array('title'=>'slug'),
    );

    public $belongsTo = array(
        'CategoriaLote' => array(
            'className'  => 'Lotes.CategoriaLote',
            'foreignKey' => 'categoria_id'
        ),
    ); 
    
}