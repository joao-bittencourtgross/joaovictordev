<?PHP 
    echo $this->Form->create('Termo',array('url'=>array('controller'=>'termo','action'=>'add')));
?>

<div class="row">
    <div class="col-md-9">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Política de privacidade</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                          //  echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('termo_uso',array('label'=>'Termos de Uso','class'=>'ckeditor'));
                         //   echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('politica_privacidade',array('label'=>'Política de privacidade','class'=>'ckeditor'));
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
