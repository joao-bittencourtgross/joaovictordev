<div class="ls-alert-box ls-dismissable">
    <header class="ls-info-header">
        <h2 class="ls-title-3">Categoria Noticia</h2>
    </header>
    
    <?PHP echo $this->Form->create('CategoriaNoticia',array('url'=>array('plugin'=>'noticias','controller'=>'categoria_noticias','action'=>'add'),'class'=>'ls-form')); ?>

        <fieldset>
            <?PHP
                echo '<label class="ls-label col-md-5">';
                    echo $this->Form->input('title',array('label'=>'Título'));
                echo '</label>';
            ?>
        </fieldset>

        <div class="ls-actions-btn"> <button class="ls-btn">Salvar</button> </div>
        
    <?PHP
        echo $this->Form->hidden('id');
        echo $this->Form->end();
    ?>
</div>
