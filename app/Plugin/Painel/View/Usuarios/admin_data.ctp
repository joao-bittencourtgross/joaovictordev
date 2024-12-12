<?PHP
echo $this->Form->create('User', array('type' => 'file','url'=>array('controller'=>'usuarios','action'=>'data')));
?>

<fieldset class="box image">
    <legend><?=__('Informações pessoais')?></legend>
    <?PHP
    echo $this->Form->input('name', array('label' => 'Nome'));
    echo $this->Form->input('email');
    ?>
</fieldset>

<?PHP
echo $this->element('Painel.image',array('label'=>'Foto','name'=>'foto'));
?>

<fieldset class="box image">
    <legend><?=__('Informações de login')?></legend>
    <?PHP
    echo $this->Form->input('password', array('label' => 'Senha', 'type' => 'password','value'=>''));
    echo $this->Form->input('password_retype', array('label' => 'Redigite a senha', 'type' => 'password','value'=>''));
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>