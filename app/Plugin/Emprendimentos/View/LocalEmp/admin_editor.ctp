<?PHP 
    echo $this->Form->create('LocalEmp',array('url'=>array('plugin'=>'emprendimentos','controller'=>'local_emp','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Local</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
//                            $ativo = array('1'=>'Sim', '0'=>'Não');
//                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('ativo',array('label'=>'Ativo','required'=>'required','options'=>$ativo,'class'=>'custom-select'));
//                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('empreendimento_id',array('label'=>'Empreendimento','options'=>$emps,'class'=>'custom-select','required'=>'required'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('igm',array('label'=>'Iframe Google Maps','class'=>'form-control')); 
                            echo '</div>';
                        ?>
                    </div>
                </div>
                
                
                
<!--                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <?PHP // echo $this->element('Painel.gallery',array('label'=>'Imagens')); ?>
                    </div>
                </div>-->
            </div>
        </div>
       
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.videos',array('label'=>'Vídeo')); ?>
            </div>
        </div>-->
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP // echo $this->element('Painel.image',array('label'=>'Imagem','name'=>'imagem','table'=>'plantas_emprendimento')); ?>
            </div>
        </div>-->
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
