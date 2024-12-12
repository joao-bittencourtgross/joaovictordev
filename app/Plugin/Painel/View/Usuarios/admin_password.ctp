<?PHP 
    if(isset($message)) {
        echo $this->Html->tag('h1', $message, array('class'=>'card-title text-success','data-delay-hide'=>2));
    }
        
    echo $this->Form->create('User', array('type' => 'file'));
?>


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Alterar senha</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password',array('label'=>'Senha atual','value'=>'','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password_new',array('label'=>'Nova senha','type'=>'password','value'=>'','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password_retype',array('label'=>'Redigite a senha','type'=>'password','value'=>'','class'=>'form-control'));
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?PHP
        echo '<button class="mt-2 btn btn-primary btn-mbm">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
