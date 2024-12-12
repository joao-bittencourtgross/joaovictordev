<?PHP
Configure::write('Painel.menu.Notícias',array(
    'Gerenciar Notícias'=>array('plugin'=>'noticias','controller'=>'noticias','action'=>'index','admin'=>true),
    'Adicionar'=>array('plugin'=>'noticias','controller'=>'noticias','action'=>'add','admin'=>true),
//    'separator',
//    'Categorias Notícias'=>array('plugin'=>'noticias','controller'=>'categoria_noticias','action'=>'index','admin'=>true),
//    'Adicionar Categoria'=>array('plugin'=>'noticias','controller'=>'categoria_noticias','action'=>'add','admin'=>true),
));