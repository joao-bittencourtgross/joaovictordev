<link rel="stylesheet" href="<?PHP echo $this->base ?>/selectize/selectize.css">
<script src="<?PHP echo $this->base ?>/selectize/selectize.js"></script>

<?PHP 
    echo $this->Form->create('Outro',array('url'=>array('plugin'=>'departamentos','controller'=>'outro','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-5 card">
            <div class="card-body">
                <h5 class="card-title">E-mails de recebimento</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('relatorios',array('id'=>'relatorios','label'=>'Relatório semanal (ATENÇÃO: digite o e-mail corretamente e aparte enter)','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('contato',array('id'=>'contato','label'=>'Formulário contato (ATENÇÃO: digite o e-mail corretamente e aparte enter)','class'=>'form-control'));
                            echo '</div>';
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('trabalhe',array('id'=>'trabalhe','label'=>'Formulário trabalhe conosco (ATENÇÃO: digite o e-mail corretamente e aparte enter)','class'=>'form-control'));
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

<script>
$(document).ready(function(){
    $('#relatorios, #contato, #trabalhe').selectize({
        persist: false,
        createOnBlur: true,
        create: true,
        plugins:['remove_button'],
        delimiter: '; '
    });
});
</script>













