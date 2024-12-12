<!--<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            Usuário
        </div>
    </div>
</div>-->

<?PHP 
    echo $this->Form->create('User',array('url'=>array('plugin'=>'painel','controller'=>'usuarios','action'=>'changepass',$user['User']['id'])));
?>


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Alterar Senha - <?PHP if(isset($user)) echo $user['User']['name']; ?></h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('password_new',array('label'=>'Senha', 'type' => 'password','value'=>'','class'=>'form-control'));
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
        echo $this->Form->hidden('id',array('value'=>$user['User']['id']));
    echo $this->Form->end();
?>

