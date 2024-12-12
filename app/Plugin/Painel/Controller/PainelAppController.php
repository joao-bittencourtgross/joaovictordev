<?PHP
class PainelAppController extends AppController {

    public $helpers=array('Media.Crop');
    
    public $uses = array(
        'Painel.User',
        'Painel.PainelConfig',
        'Painel.Activate',
    );
    
    public $paginate = array('limit' => 10);

}