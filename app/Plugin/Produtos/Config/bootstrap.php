<?PHP
Configure::write('Painel.menu.Projetos',array(
    'Gerenciar Projetos'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'add','admin'=>true),
));