<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Esqueci minha senha</title>
<?PHP
echo $this->Html->css('Painel.login.less.css?'.time(),'stylesheet/less');
echo $this->Html->script('Painel.less');
?>
</head>
<body>    
    <div id="login">       
        <?PHP echo $this->Html->image('Painel.login/logo.png',array('id'=>'logo')); ?>
        <div class="inner">
            <h1 class="title">Esqueci minha senha</h1>            
            <?PHP
            if(isset($message)) echo '<h3>'.$message.'</h3>';
            
            echo $this->Form->create('User',array('id'=>'recover-form'));
            echo $this->Form->input('email',array('label'=>'E-mail'));
            echo $this->Form->end('Recuperar Senha');
            
            
            ?>
        </div>
        <div class="reflex"></div>
    </div>    
</body>
</html>