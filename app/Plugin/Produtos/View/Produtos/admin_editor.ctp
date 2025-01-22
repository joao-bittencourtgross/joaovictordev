<?PHP
echo $this->Form->create('Produto', array('url' => array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Projeto</h5>

                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP
                        $categorias = array('0' => 'GitHub privado', '1' => 'Link privado', '2' => 'Público');

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('categoria', array('label' => 'Categorias', 'required' => 'required', 'options' => $categorias, 'class' => 'custom-select'));
                        echo '</div>';

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('titulo', array('label' => 'Título', 'class' => 'form-control'));
                        echo '</div>';

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('subtitulo', array('label' => 'Tecnologias', 'class' => 'form-control'));
                        echo '</div>';

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('link', array('label' => 'Link do projeto', 'class' => 'form-control'));
                        echo '</div>';

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('github', array('label' => 'GitHub do projeto', 'class' => 'form-control'));
                        echo '</div>';

                        echo '<div class="position-relative form-group">';
                        echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'ckeditor'));
                        echo '</div>';

                        // echo '<div class="position-relative form-group">';
                        //      echo $this->Form->input('recomendacao',array('label'=>'Recomendado para:','class'=>'ckeditor'));
                        //  echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image', array('label' => 'Imagem (540x425)', 'name' => 'imagem', 'table' => 'tb_produtos', 'reduce' => 'banner')); ?>
            </div>
        </div>

        <!-- <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.image',array('label'=>'Ícone (100x125)','name'=>'icone','table'=>'tb_produtos','reduce'=>'banner')); 
                ?>
            </div>
        </div> 
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.gallery',array('label'=>'Galeria de imagens')); 
                ?>
            </div>
        </div>
        
         <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP //echo $this->element('Painel.videos',array('label'=>'Vídeo')); 
                ?>
            </div>
        </div> -->
    </div>
</div>


<?PHP
echo '<button class="mt-2 btn btn-primary">Salvar</button>';
echo $this->Form->hidden('id');
echo $this->Form->end();
?>