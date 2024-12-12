<?PHP 
    echo $this->Form->create('Texto',array('url'=>array('controller'=>'texto','action'=>'add')));
  // pre($this->data);
?>

<div class="row">
    <div class="col-md-9">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Textos</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title_future_1',array('label'=>'Título ao lado do banner HOME','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title_future_2',array('label'=>'Texto ao lado do banner HOME','class'=>'form-control'));
                            echo '</div>';

                          //  echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('texto_future_1',array('label'=>'Texto FUTURO','class'=>'ckeditor'));
                           // echo '</div>';

                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('texto_future_2',array('label'=>'Texto Números FUTURO','class'=>'ckeditor'));
                           // echo '</div>';

                           // echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('title_numbers_1',array('label'=>'Título Números','class'=>'form-control'));
                          //  echo '</div>';

                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('title_numbers_2',array('label'=>'Título Números Porcentagem','class'=>'form-control'));
                           // echo '</div>';

                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('text_numbers_1',array('label'=>'Texto Números','class'=>'ckeditor'));
                          //  echo '</div>';

                           // echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('text_numbers_2',array('label'=>'Texto Números Porcentagem','class'=>'ckeditor'));
                          //  echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
      <!--  <div class="main-card mb-3 card">
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
