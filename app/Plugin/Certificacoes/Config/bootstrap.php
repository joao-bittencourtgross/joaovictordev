<?PHP
Configure::write('Painel.menu.Tecnologias',array(
    'Gerenciar Tecnologias'=>array('plugin'=>'certificacoes','controller'=>'certificacoes','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'certificacoes','controller'=>'certificacoes','action'=>'add','admin'=>true),
));