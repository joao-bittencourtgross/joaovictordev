<?PHP
class LotesAppController extends AppController{
    
    public $uses = array(
        'Lotes.Lote',
        'Lotes.CategoriaLote',
        'Lotes.ContatoLote',
    );
    
}