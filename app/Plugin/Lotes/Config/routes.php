<?PHP
Router::connect('/mapa/loteamento-paraiso-tropical',array('plugin'=>'lotes','controller'=>'lotes','action'=>'index'));
Router::connect('/mapa/loteamento-paraiso-tropical/:slug',array('plugin'=>'lotes','controller'=>'lotes','action'=>'index'),array('slug'=>'[a-zA-Z0-9-_]+'));
Router::connect('/mapa-lotes',array('plugin'=>'lotes','controller'=>'lotes','action'=>'mapalote'));

Router::connect('/detalhe-lote/:slug',array('plugin'=>'lotes','controller'=>'lotes','action'=>'ajax_lote'),array('slug'=>'[a-zA-Z0-9-_]+'));

Router::connect('/detalhe-lote-bella-vita/:slug',array('plugin'=>'lotes','controller'=>'lotes','action'=>'ajax_lote_bella_vita'),array('slug'=>'[a-zA-Z0-9-_]+'));


//Router::connect('/mapa/loteamento-bella-vita',array('plugin'=>'lotes','controller'=>'lotes','action'=>'bella_vita_redirect'));
Router::connect('/mapa/loteamento-bella-vita',array('plugin'=>'lotes','controller'=>'lotes','action'=>'bella_vita'));

