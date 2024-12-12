<?PHP 
    echo $this->Form->create('Noticia',array('url'=>array('action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Notícia</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto',array('label'=>'Texto','class'=>'ckeditor'));
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Imagem thumb (400x240)','name'=>'imagem','table'=>'tb_noticias','reduce'=>'banner')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Banner Interno (1920x600)','name'=>'banner','table'=>'tb_noticias','reduce'=>'banner')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.gallery',array('label'=>'Galeria de imagens')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.videos',array('label'=>'Vídeo')); ?>
            </div>
        </div>
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
