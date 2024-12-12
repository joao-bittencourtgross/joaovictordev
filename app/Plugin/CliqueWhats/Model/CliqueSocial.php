<?PHP
class CliqueSocial extends CliqueWhatsAppModel {
    
    var $name = 'CliqueSocial';
    var $useTable = 'wp_cliques_sociais';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(CliqueSocial.created,'%d/%m/%Y %H:%i')",
    );
    
}