<?PHP
Configure::write('Painel.menu.Educação',array(
    'Gerenciar Educação'=>array('plugin'=>'educacoes','controller'=>'educacoes','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'educacoes','controller'=>'educacoes','action'=>'add','admin'=>true),
));