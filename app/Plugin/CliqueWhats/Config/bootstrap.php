<?PHP
Configure::write('Painel.menu.WhatsApp/Redes Sociais',array(
    'Cliques de WhatsApp'=>array('plugin'=>'clique_whats','controller'=>'clique_whats','action'=>'index','admin'=>true),
    'separator',
    'Informações'=>array('plugin'=>'clique_whats','controller'=>'informacao','action'=>'edit','admin'=>true),
));