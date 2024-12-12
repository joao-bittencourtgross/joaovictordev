<?PHP
Router::connect('/noticias',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'));
//Router::connect('/noticias/:slug',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'),array('slug'=>'[a-zA-Z0-9-_]+'));
//Router::connect('/noticias/:slug/page/:page',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'),array('slug'=>'[a-zA-Z0-9-_]+','page'=>'[0-9]+'));
Router::connect('/noticias/page/:page',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'),array('page'=>'[0-9]+'));
Router::connect('/noticias/:slug',array('plugin'=>'noticias','controller'=>'noticias','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+'));
