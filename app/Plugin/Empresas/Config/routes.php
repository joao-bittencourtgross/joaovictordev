<?PHP
Router::connect('/empresas',array('plugin'=>'empresas','controller'=>'empresas','action'=>'index'));
Router::connect('/empresas/:slug',array('plugin'=>'empresas','controller'=>'empresas','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+'));