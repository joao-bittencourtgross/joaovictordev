<?PHP
class CliqueWhatsAppController extends AppController{
    
    public $uses = array(
        'CliqueWhats.CliqueWhats',
        'CliqueWhats.CliqueSocial',
        'CliqueWhats.Informacao'
    );
    
}