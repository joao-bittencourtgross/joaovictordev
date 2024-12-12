<?PHP 
    echo $this->Html->script('jquery.maskMoney.js',array('inline'=>true)); 
    echo $this->Form->create('Lote',array('url'=>array('action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-9">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Status</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            $ativo = array('1'=>'Sim', '0'=>'Não');
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('categoria_id',array('label'=>'Status','options'=>$select_categoria,'class'=>'custom-select'));
                            echo '</div>';
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('ativo',array('label'=>'Ativo','options'=>$ativo,'class'=>'custom-select'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('valor',array('label'=>'Valor','class'=>'form-control','id'=>'valor')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto',array('label'=>'Texto','class'=>'form-control','class'=>'ckeditor')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('cordenadas',array('label'=>'Cordenadas','class'=>'form-control','style'=>'height: 70px;')); 
                            echo '</div>';
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('livre',array('label'=>'Observações','class'=>'form-control')); 
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
    $("#valor").maskMoney({showSymbol:true, decimal:",", thousands:"."});
});
</script>