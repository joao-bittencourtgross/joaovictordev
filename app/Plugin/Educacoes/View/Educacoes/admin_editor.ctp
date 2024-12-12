<?PHP 
    echo $this->Form->create('Educacao',array('url'=>array('plugin'=>'educacoes', 'controller'=>'educacoes','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Educação</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('titulo',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('instituicao',array('label'=>'Instituição','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('tipo',array('label'=>'Tipo de ensino','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('duracao',array('label'=>'Duração','class'=>'form-control')); 
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
