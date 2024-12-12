<?PHP 
    echo $this->Form->create('Certificacao',array('url'=>array('plugin'=>'certificacoes', 'controller'=>'certificacoes','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Tecnologia</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                           // $destaque = array('1'=>'Sim', '0'=>'Não');
                                                        
                          //  echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('destaque',array('label'=>'Destaque na página inicial','required'=>'required','options'=>$destaque,'class'=>'custom-select'));
                          //  echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('titulo',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';

                          //  echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('subtitulo',array('label'=>'Subtítulo','class'=>'form-control')); 
                           // echo '</div>';
                            
                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('descricao',array('label'=>'Descrição','class'=>'ckeditor'));
                           // echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Imagem (350x120)','name'=>'imagem','table'=>'tb_certificacoes','reduce'=>'banner')); ?>
            </div>
        </div>
        
       <!-- <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.image',array('label'=>'Ícone','name'=>'icone','table'=>'tb_certificacoes','reduce'=>'banner')); ?>
            </div>
        </div> -->
        
      <!--  <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.gallery',array('label'=>'Galeria de imagens')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.videos',array('label'=>'Vídeo')); ?>
            </div>
        </div> -->
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
