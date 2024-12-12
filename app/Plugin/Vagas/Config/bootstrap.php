<?PHP
Configure::write('Painel.menu.Vagas',array(
    'Gerenciar Vagas'=>array('plugin'=>'vagas','controller'=>'vagas','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'vagas','controller'=>'vagas','action'=>'add','admin'=>true),
));