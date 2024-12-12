<?PHP
class EmprendimentosAppController extends AppController{
    
    public $uses = array(
        'Emprendimentos.Emprendimento',
        'Emprendimentos.DiferencialEmp',
        'Emprendimentos.DiferencialEmpOpc',
        'Emprendimentos.DiferencialEmpreendimento',
        'Emprendimentos.LocalEmp',
        'Emprendimentos.ProgressoEmp',
//        'Contatos.ContatoCatalogo',
        'Contatos.ContatoEmp',
        'Cidades.Cidade',
    );
    
}