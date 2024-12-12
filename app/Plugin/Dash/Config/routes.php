<?PHP
Router::connect('/dash',array('plugin'=>'dash','controller'=>'dash','action'=>'index'));
Router::connect('/rotinas/relatorio-semanal',array('plugin'=>'dash','controller'=>'relatorio','action'=>'semanal'));