<?PHP
Router::connect('/admin/logout/logout',array('plugin'=>'painel','controller'=>'usuarios','action'=>'logout','admin'=>false));

Router::connect('/recover',array('plugin'=>'painel','controller'=>'usuarios','action'=>'recover','admin'=>false));
Router::connect('/download/*',array('plugin'=>'painel','controller'=>'uploads','action'=>'download','admin'=>false));
Router::connect('/admin',array('plugin'=>'painel','controller'=>'usuarios','action'=>'login','admin'=>false));
//Router::connect('/login',array('plugin'=>'painel','controller'=>'usuarios','action'=>'login','admin'=>false));
