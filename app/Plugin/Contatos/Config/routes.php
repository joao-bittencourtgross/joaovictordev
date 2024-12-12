<?PHP
Router::connect('/contato',array('plugin'=>'contatos','controller'=>'contatos','action'=>'index'));
Router::connect('/trabalhe-conosco',array('plugin'=>'contatos','controller'=>'trabalhe','action'=>'index'));
Router::connect('/representante',array('plugin'=>'contatos','controller'=>'contato_produtor','action'=>'index'));