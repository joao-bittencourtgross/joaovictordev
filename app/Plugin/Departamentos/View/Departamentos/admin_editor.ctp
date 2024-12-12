<link rel="stylesheet" href="<?PHP echo $this->base ?>/selectize/selectize.css">
<script src="<?PHP echo $this->base ?>/selectize/selectize.js"></script>

<?PHP 
    echo $this->Form->create('Departamento',array('url'=>array('action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Departamento</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Nome','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('emails',array('id'=>'emails','label'=>'E-mails que recebem (ATENÇÃO: digite o e-mail corretamente e aparte enter)','class'=>'form-control'));
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

<script>
$(document).ready(function(){
    $('#emails').selectize({
        persist: false,
        createOnBlur: true,
        create: true,
        plugins:['remove_button'],
        delimiter: '; '
    });
});
</script>













