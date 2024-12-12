<?PHP
class Dash extends DashAppModel {
    
    var $useTable = 'acesso_dashboard';
    
    public $virtualFields = array(
        'cdate'=>"DATE_FORMAT(Dash.created,'%d/%m/%Y %H:%i')",
    );
    
}