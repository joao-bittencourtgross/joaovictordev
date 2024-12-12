<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="robots" CONTENT="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?PHP echo $this->Html->url('/pnl/assets/images/favicon.png',true); ?>">
        <title>ADM</title>
        <script>
            var base = '<?= $this->base ?>';
        </script>
        <?PHP
//            echo $this->Html->css('/pnl/login');
            echo $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap');
            echo $this->Less->css('login'); 
        ?>
    </head>
    <body> 
        <div class="d-out">
            <div class="box-login">
<!--                <div class="row logo">
                    <img src="<?PHP // echo $this->Html->url('/pnl/assets/images/logo.png',true); ?>" alt="" />
                </div>-->
                <?PHP 
                    echo '<div class="row msgl">';
                        if (isset($message)){ 
                            echo '<p>'.$message.'</p>'; 
                        }
                    echo '</div>';
                
                    echo $this->Form->create('User',array('id'=>'login-form','url'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'login')));
                        echo $this->Form->input('username',array('label'=>false,'value'=>'','autocomplete'=>'off','placeholder'=>'Usuário'));
//                        echo '<div class="row user-input-wrp">';
//                            echo $this->Form->input('username',array('label'=>false,'value'=>'','autocomplete'=>'off','class'=>'inputText'));
//                            echo '<span class="floating-label">Your user mother fucker</span>';
//                        echo '</div>';
                        echo $this->Form->input('password',array('label'=>false,'value'=>'','autocomplete'=>'off','placeholder'=>'Senha'));
                        echo '<div class="row">';
                            echo $this->Form->submit('Login');
                        echo '</div>';
                        echo '<div class="row forget">';
                            echo $this->Html->link('Esqueci minha senha','#',array('id'=>'recover'));
                        echo '</div>';
                    echo $this->Form->end();
                    
                    echo $this->Form->create('User',array('id'=>'recover-form','url'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'recover')));
                        echo $this->Form->input('email',array('label'=>false,'placeholder'=>'E-mail'));
                        echo $this->Form->submit('Recuperar Senha');
                        echo '<div class="row forget">';
                            echo $this->Html->link('Login','#',array('id'=>'pannel'));
                        echo '</div>';
                    echo $this->Form->end();
                ?>
            </div>
        </div>
        
    
        
        <script src="<?PHP echo $this->Html->url('/js/less.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/jquery.js',true); ?>"></script>
        
        <script>
            $(document).ready(function(){
                $('#recover-form').hide();
                $('#recover').click(function(){
                    $('#login-form').hide();
                    $('#recover-form').show();
                    return false;
                });
                $('#pannel').click(function(){
                    $('#login-form').show();
                    $('#recover-form').hide();
                    return false;
                });
            });
            
            $('.input100').each(function(){
                $(this).on('blur', function(){
                    if($(this).val().trim() != "") {
                        $(this).addClass('has-val');
                    }
                    else {
                        $(this).removeClass('has-val');
                    }
                })    
            });
        </script>
    </body>
</html>