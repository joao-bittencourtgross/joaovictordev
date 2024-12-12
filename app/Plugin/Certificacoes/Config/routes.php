<?PHP
Router::connect('/certificacoes',array('plugin'=>'certificacoes','controller'=>'certificacoes','action'=>'index'));
Router::connect('/certificacoes/page/:page',array('plugin'=>'certificacoes','controller'=>'certificacoes','action'=>'index'),array('page'=>'[0-9]+'));
Router::connect('/certificacoes/:slug',array('plugin'=>'certificacoes','controller'=>'certificacoes','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+'));
