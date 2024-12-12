<?PHP
Router::connect('/empreendimentos',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'index'));
Router::connect('/ver-empreendimentos',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'load_emps'));

Router::connect('/empreendimentos/page/:page',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'index'),array('page'=>'[0-9]+'));

Router::connect('/empreendimentos/:slug/:emp',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+','emp'=>'[a-zA-Z0-9-_]+'));
Router::connect('/empreendimentos/:slug',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'index'),array('slug'=>'[a-zA-Z0-9-_]+'));


Router::connect('/carrega-empreendimentos/:slug',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'load_emp'),array('slug'=>'[a-zA-Z0-9-_]+'));
Router::connect('/carrega-local/:slug',array('plugin'=>'emprendimentos','controller'=>'local_emp','action'=>'load_local'),array('slug'=>'[a-zA-Z0-9-_]+'));
