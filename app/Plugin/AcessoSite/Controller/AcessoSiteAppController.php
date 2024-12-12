<?PHP
class AcessoSiteAppController extends AppController{
    
    public $uses = array(
        'AcessoSite.AcessoSite',
        'AcessoSite.Relatorio',
        'Contatos.Contato',
        'CliqueWhats.CliqueWhats',
        'CliqueWhats.CliqueSocial',
        'Departamentos.Outro',
    );
    
}