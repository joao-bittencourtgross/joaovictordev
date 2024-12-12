<?PHP
class DepartamentosAppController extends AppController{
    
    public $uses = array(
                    'Departamentos.Departamento',
                    'Departamentos.Outro'
                );
    
}