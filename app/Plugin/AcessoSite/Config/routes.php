<?PHP
Router::connect('/acessos-site',array('plugin'=>'acesso','controller'=>'acesso','action'=>'index'));
Router::connect('/relatorio/semanal',array('plugin'=>'acesso_site','controller'=>'relatorio','action'=>'semanal'));
