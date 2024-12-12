<?PHP
echo $this->Form->create('PainelConfig');
?>
<fieldset class="box">
    <legend><?=$title?></legend>
    
    <?PHP
    echo $this->Form->hidden('PainelConfig.0.id',array('value'=>'painel.config.title'));
    echo $this->Form->hidden('PainelConfig.0.value',array('label'=>'Título do site'));
    ?>
    
</fieldset>
<?PHP
echo $this->Form->end('Enviar');
?>