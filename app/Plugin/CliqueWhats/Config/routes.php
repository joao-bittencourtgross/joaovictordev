<?PHP
Router::connect('/fale-via-whatsapp',array('plugin'=>'clique_whats','controller'=>'clique_whats','action'=>'index'));

Router::connect('/redireciona-redes-sociais/:slug',array('plugin'=>'clique_whats','controller'=>'clique_whats','action'=>'redirect_sociais'),array('slug'=>'[a-zA-Z0-9-_]+'));