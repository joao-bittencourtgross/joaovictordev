<?PHP
Configure::write('Painel.menu.Parceiros',array(
    'Gerenciar Parceiros'=>array('plugin'=>'empresas','controller'=>'empresas','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'empresas','controller'=>'empresas','action'=>'add','admin'=>true),
    //'Categorias'=>array('plugin'=>'empresas','controller'=>'categoria_empresas','action'=>'index','admin'=>true),
));