<?PHP
class NoticiasAppController extends AppController{
    
    public $uses = array(
        'Noticias.Noticia',
        'Noticias.CategoriaNoticia',
    );
    
}