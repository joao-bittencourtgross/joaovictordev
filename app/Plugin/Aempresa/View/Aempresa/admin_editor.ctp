<?PHP 
    echo $this->Form->create('Aempresa',array('url'=>array('controller'=>'aempresa','action'=>'add')));
?>

<div class="row">
    <div class="col-md-9">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Sobre</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto_inicial',array('label'=>'Texto página inicial','class'=>'ckeditor'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto',array('label'=>'Texto Sobre','class'=>'ckeditor'));
                            echo '</div>';
                            
                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('missao',array('label'=>'Missão','class'=>'ckeditor'));
                           // echo '</div>';
                            
                          //  echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('visao',array('label'=>'Visão','class'=>'ckeditor'));
                           // echo '</div>';
                            
                         //   echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('valores',array('label'=>'Valores','class'=>'ckeditor'));
                           // echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
       <!-- <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP   // echo $this->element('Painel.videos',array('label'=>'Vídeo')); ?>
            </div>
        </div> -->
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Imagem','name'=>'imagem','table'=>'tb_aempresa')); ?>
            </div>
        </div>
        
      <!--  <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.gallery',array('label'=>'Galeria de Imagens')); ?>
            </div>
        </div> -->
        
        
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
