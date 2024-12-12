<?PHP
class CliqueWhats extends CliqueWhatsAppModel{
    
    var $name = 'CliqueWhats';
    var $useTable = 'wp_cliques_whatsapp';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(CliqueWhats.created,'%d/%m/%Y %H:%i')",
    );
    
}