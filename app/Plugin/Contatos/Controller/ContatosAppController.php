<?PHP
class ContatosAppController extends AppController{
    
    public $uses = array(
        'Contatos.Contato',
        'Contatos.Trabalhe',
        'Contatos.ContatoProdutor',
        'Departamentos.Departamento',
        'Departamentos.Outro',
        'Vagas.Vaga',
    );
    
}