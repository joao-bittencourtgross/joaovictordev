<?PHP
date_default_timezone_set('America/Sao_Paulo');
//pr exit function
function pre($object){ pr($object); exit; }
//Configure the prefixes
$prefixes = Configure::read('Routing.prefixes');
if (is_array($prefixes)) $prefixes = array_merge($prefixes, array('admin'));
else $prefixes = array('admin');
Configure::write('Routing.prefixes', $prefixes);