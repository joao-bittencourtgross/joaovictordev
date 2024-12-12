<?PHP
Configure::write('Painel.menu.Unidades',array(
    'Gerenciar'=>array('plugin'=>'unidades','controller'=>'unidades','action'=>'index','admin'=>true),
    'Adicionar Nova'=>array('plugin'=>'unidades','controller'=>'unidades','action'=>'add','admin'=>true),
));