<?PHP
class Informacao extends CliqueWhatsAppModel{
    
    var $useTable = 'whatsapp_sociais';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Informacao.created,'%d/%m/%Y %H:%i')",
        'mdate'=>"DATE_FORMAT(Informacao.modified,'%d/%m/%Y %H:%i')",
    );

}