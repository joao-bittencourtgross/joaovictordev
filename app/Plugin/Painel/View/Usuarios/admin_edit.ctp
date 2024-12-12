
<!--<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            Usuário
        </div>
    </div>
</div>-->

<?PHP 
    echo $this->Form->create('User', array('type' => 'file','url'=>array('controller'=>'usuarios','action'=>'add')));
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
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('password',array('label'=>'Senha', 'type' => 'password','value'=>'','class'=>'form-control'));
//                            echo '</div>';
//                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('password_retype',array('label'=>'Redigite a senha', 'type' => 'password','value'=>'','class'=>'form-control'));
//                            echo '</div>';
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

