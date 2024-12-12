<?PHP
Configure::write('Painel.menu.Banners',array(
    'Gerenciar Banners'=>array('plugin'=>'banners','controller'=>'banners','action'=>'index','admin'=>true),
    'Adicionar Novo'=>array('plugin'=>'banners','controller'=>'banners','action'=>'add','admin'=>true),
));