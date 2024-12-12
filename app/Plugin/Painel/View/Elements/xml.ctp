<?PHP
if(!isset($label)) $label="Selecione o arquivo XML";
$data=$this->data;
$data=array_shift($data);
$path=(isset($data[$name]) && !empty($data[$name])) ? $data[$name]:'';
$image=isset($path) && !empty($path) ? 'Painel.file.png' : 'Painel.nofile.png';
?>

<fieldset class="box xml file" data-name="<?=$name?>">
    <legend><?=$label?></legend>
    <?PHP
        echo $this->Form->input("file",array('type'=>'file','label'=>'Selecione um arquivo','data-extensions'=>'xml','data-maxsize'=>8000));
        echo $this->Form->hidden($name,array('value'=>$path));
        echo $this->Html->image($image);
        echo $this->Html->tag('div','',array('class'=>'grayline'));
    ?>
</fieldset>