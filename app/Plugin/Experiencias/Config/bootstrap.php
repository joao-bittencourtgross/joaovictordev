<?PHP
Configure::write('Painel.menu.Experiências',array(
    'Gerenciar Experiências'=>array('plugin'=>'experiencias','controller'=>'experiencias','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'experiencias','controller'=>'experiencias','action'=>'add','admin'=>true),
));