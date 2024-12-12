<?PHP
include_once "default.php";

## MENU GENERATOR
Configure::write('Painel.menu.Usuarios',array(
    'Gerenciar usuários' => array('plugin' => 'painel', 'controller' => 'usuarios', 'action' => 'index','admin'=>true),
    'Adicionar usuário' => array('plugin' => 'painel', 'controller' => 'usuarios', 'action' => 'add','admin'=>true),
    
//    'separator',
//    'Gerenciar usuários bloqueados'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'blocked','admin'=>true),
//    'Gerenciar usuários inativos'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'inactive','admin'=>true),
));