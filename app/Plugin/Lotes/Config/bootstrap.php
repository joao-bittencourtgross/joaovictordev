<?PHP
Configure::write('Painel.menu.Lotes',array(
    'Gerenciar'=>array('plugin'=>'lotes','controller'=>'lotes','action'=>'index','admin'=>true),
    'Adicionar Novo'=>array('plugin'=>'lotes','controller'=>'lotes','action'=>'add','admin'=>true),
    'separator',
    'Status'=>array('plugin'=>'lotes','controller'=>'categoria_lotes','action'=>'index','admin'=>true),
));