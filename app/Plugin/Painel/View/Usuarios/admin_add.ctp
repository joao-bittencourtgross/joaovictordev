<!--<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            Usuário
        </div>
    </div>
</div>-->

<?PHP 
    echo $this->Form->create('User', array('type' => 'file'));
?>


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Usuário</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('group',array('label'=>'Grupo de acesso','required'=>'required','options'=>$groups,'class'=>'custom-select','id'=>'grupo_acesso'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('name',array('label'=>'Nome','id'=>'nome','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('email',array('label'=>'E-mail','id'=>'email','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('username',array('label'=>'Usuário','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password',array('label'=>'Senha', 'type' => 'password','value'=>'','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password_retype',array('label'=>'Redigite a senha', 'type' => 'password','value'=>'','class'=>'form-control'));
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>




<!--<br><br><br><br><br>-->

<!--<div class="ls-alert-box ls-dismissable">
    <header class="ls-info-header">
        <h2 class="ls-title-3">Informações do Usuário</h2>
    </header>
    
    <?PHP
    //    echo $this->Form->create('User',array('url'=>array('action'=>'add'),'class'=>'ls-form'));
        echo $this->Form->create('User', array('type' => 'file'));
    ?>
    
    <fieldset>
        <?PHP
            echo '<label class="ls-label col-md-3">';
                echo '<b class="ls-label-text">Grupo de acesso</b>';
                echo '<div class="ls-custom-select">';
                    echo $this->Form->input('group',array('label'=>false,'options'=>$groups,'class'=>'ls-select','id'=>'grupo_acesso'));
                echo '</div>';
            echo '</label>';
       
            
            echo '<label class="ls-label col-md-3">';
                
            echo '</label>';
            
            
            
//            echo '<label class="ls-label col-md-3">';
//                echo $this->Form->input('username',array('label'=>'Usuário','id'=>'usuario'));
//            echo '</label>';
            
            echo '<label class="ls-label col-md-3">';
                
            echo '</label>';
            
            echo '<label class="ls-label col-md-3">';
                
            echo '</label>';
        ?>
    </fieldset>
    
    <div class="ls-actions-btn">
        <button class="ls-btn">Salvar</button>
    </div>
    <?PHP
        echo $this->Form->hidden('id');
        echo $this->Form->end();
    ?>
</div>-->

<!--<script type="text/javascript">
$(document).ready(function(){
    $('#bg_select_loja').hide();
    $('#grupo_acesso, #selectloja, #nome, #email, #usuario').val('');
    
    $('#grupo_acesso').change(function () {
        if(this.value === 'loja'){
            $('#bg_select_loja').show();
        }else {
            $('#selectloja, #nome, #email').val('');
            $('#bg_select_loja').hide();
        }
    });
    
    $('#selectloja').change(function(){
        var idLoja = this.value;
        if(idLoja !== ''){
            var now = new Date(); 
            var hs = now.getDate()+""+now.getHours()+""+now.getMinutes()+""+now.getSeconds();

            $.getJSON(base+"/lojas/lojas/ajax_loja?rand="+hs,{ 
                id: idLoja
            },function(retorno) {
                $('#nome').val(retorno.title);
                $('#email').val(retorno.email);
            });
        }else{
            $('#nome, #email').val('');
        }
    });

});
</script>-->
