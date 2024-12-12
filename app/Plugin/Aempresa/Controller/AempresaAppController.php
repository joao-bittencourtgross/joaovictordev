<?PHP
class AempresaAppController extends AppController{
    
    public $uses = array(
        'Aempresa.Aempresa',
        'Experiencias.Experiencia',
        'Educacoes.Educacao',
    );
    
}