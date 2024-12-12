<?PHP
class DashAppController extends AppController {
    
    public $uses = array(
        'Dash.Dash',
        'Acessos.Acesso',
        'Acessos.AcessoLoja',
        'Acessos.AcessoWhats',
        'Acessos.AcessoNoticia',
        'Acessos.Click',
        'Acessos.AcessoRedirect',
        'Telefones.Telefonewhat',
        'Forms.Form',
        'Forms.FormLoja',
        'Forms.FormEvento',
        'Newsletters.Newsletter',
        'Newsletters.Indicacao',
        'Produtos.Produto',
        'Noticias.Noticia',
        'Lojas.Loja',
        'Vagas.Curriculo',
        'Contatos.Contato',
        'Clientes.Cliente'
    );
    
}