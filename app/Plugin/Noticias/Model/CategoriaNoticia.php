<?PHP
class CategoriaNoticia extends NoticiasAppModel{

    var $useTable = 'categoria_noticias';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(CategoriaNoticia.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(CategoriaNoticia.modified,'%d/%m/%Y')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notEmpty','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Slug'=>array('title'=>'slug'),
    );
    
}