<?PHP

foreach ($emps as $emprendimento) {
    echo '<div class="box-lemp">';
        echo $this->Html->link('<span class="status">'.$emprendimento['Emprendimento']['status'].'</span>',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'view','slug'=>$emprendimento['Cidade']['slug'],'emp'=>$emprendimento['Emprendimento']['slug']),array('escape'=>false));
        echo $this->Html->link($this->Html->image('/'.$emprendimento['Emprendimento']['logo']),array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'view','slug'=>$emprendimento['Cidade']['slug'],'emp'=>$emprendimento['Emprendimento']['slug']),array('escape'=>false));
    echo '</div>';
}