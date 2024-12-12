<?PHP
Router::connect('/produtos',array('plugin'=>'produtos','controller'=>'produtos','action'=>'index'));
Router::connect('/produtos/categoria/:categoria', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index'), array('pass' => array('categoria')));
Router::connect('/produtos/page/:page',array('plugin'=>'produtos','controller'=>'produtos','action'=>'index'),array('page'=>'[0-9]+'));
Router::connect('/produtos/:slug',array('plugin'=>'produtos','controller'=>'produtos','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+'));
