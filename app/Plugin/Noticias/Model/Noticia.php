<?PHP
class Noticia extends NoticiasAppModel{
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Noticia.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Noticia.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
        'Searchable'=>array('title','texto')
    );
    
//    public $belongsTo = array(
//        'CategoriaNoticia'=>array(
//            'className'=>'Noticias.CategoriaNoticia',
//            'foreignKey'=>'categoria_id'
//        ),
//    );    
    
}