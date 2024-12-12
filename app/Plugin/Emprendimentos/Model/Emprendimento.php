<?PHP
class Emprendimento extends EmprendimentosAppModel{
    
    var $useTable = 'emprendimentos';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Emprendimento.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Emprendimento.modified,'%d/%m/%Y %H:%i')",
    );
    
    public $validate = array(
        'title'=>array('rule'=>'notBlank','message'=>'Não deixe este campo em branco'),
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Slug' => array('title'=>'slug'),
        'Searchable'=>array('title','cidade','status','resumo_home','texto','texto_localizacao','titulo_catalogo','seo_palavras','seo_descricao')
    );
    
//    public $hasAndBelongsToMany = array(
//        'Diferencial' => array(
//            'className' => 'Diferencials.Diferencial',
//            'joinTable' => 'join_emprendimento_diferencial',
//            'foreignKey' => 'emprendimento_id',
//            'associationForeignKey' => 'diferencial_id',
//        ),
//    );
    
    public $belongsTo = array(
        'Cidade' => array(
            'className'  => 'Cidades.Cidade',
            'foreignKey' => 'cidade_id'
        )
    );
    
}