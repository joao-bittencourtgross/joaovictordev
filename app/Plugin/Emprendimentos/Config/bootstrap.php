<?PHP
Configure::write('Painel.menu.Empreendimentos',array(
    'Gerenciar'=>array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'index','admin'=>true),
    'Novo Empreendimento'=>array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'add','admin'=>true),
    'Diferenciais'=>array('plugin'=>'emprendimentos','controller'=>'diferencial_emp','action'=>'index','admin'=>true),
   // 'Locais Próximos'=>array('plugin'=>'emprendimentos','controller'=>'local_emp','action'=>'index','admin'=>true),
    'Progresso da Obra'=>array('plugin'=>'emprendimentos','controller'=>'progresso_emp','action'=>'index','admin'=>true),
//    'Nova Galeria'=>array('plugin'=>'emprendimentos','controller'=>'galerias','action'=>'add','admin'=>true),
//    'Plantas'=>array('plugin'=>'emprendimentos','controller'=>'plantas','action'=>'index','admin'=>true),
//    'Nova Planta'=>array('plugin'=>'emprendimentos','controller'=>'plantas','action'=>'add','admin'=>true),
));