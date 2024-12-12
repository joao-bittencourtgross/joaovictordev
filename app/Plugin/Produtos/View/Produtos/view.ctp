<div class="title-subpages">
    <div class="container-img-banner-subpages">
        <?php echo $this->Html->image('banner-subpages.png', array('alt'=>'Banner')) ?>
        <h1>Produtos</h1>
    </div>
</div>

<section class="container-products-subpages-view">
    <div class="container">
        <div class="btns-links-products-subpages">
            <?php echo $this->Html->link('Produtos', array('plugin'=>'produtos', 'controller'=>'produtos', 'action'=>'index')); ?>
            <span>></span>
            <?php echo $this->Html->link(''.$post['Produto']['categoria'].'', array('plugin'=>'produtos', 'controller'=>'produtos', 'action'=>'index', 'categoria'=>$post['Produto']['categoria'])); ?>
            <span>></span>
            <?php echo $this->Html->link(''.$post['Produto']['titulo'].'', array('plugin'=>'produtos', 'controller'=>'produtos', 'action'=>'view', 'slug'=>$post['Produto']['slug'])); ?>
        </div>
        <?php 
            echo '<div class="row box-products-view">';
                echo '<div class="six columns">';
                    echo $this->Html->image('/'.$post['Produto']['imagem'], array('alt'=>$post['Produto']['titulo']));
                echo '</div>';
                echo '<div class="six columns">';
                    echo '<h2>'.$post['Produto']['titulo'].'</h2>';
                    echo '<h3>'.$post['Produto']['subtitulo'].'</h3>';
                    echo '<p>'.$post['Produto']['descricao'].'</p>';
                echo '</div>';
            echo '</div>';
        ?>
    </div>
</section>

<section class="container-gallery-view-products">
    <div class="container">
        <div class="row">
            <div class="six columns">
                <h2>Recomendado para</h2>
                <p>Atender os mais diversos segmentos como: alimentos, eletrônicos, produtos de limpeza, cosméticos entre outros. Também pode ser utilizado para unitizar e armazenar produtos como em indústrias de bebidas, facilitando o transporte e manuseio</p>
            </div>
            <div class="six columns">
                <div class="slide-products">
                    <?php 
                        if (count($post['Galleries']) > 0) {
                            foreach ($post['Galleries']['images'] as $gallery) {
                                $img = $this->Html->image('/'.$gallery['path'], array('alt'=>$gallery['legend']));
            
                                echo '<div class="box-gallery-view-products">';
                                    echo $this->Html->link($img,'/'.$gallery['path'],array('escape'=>false,'title'=>$gallery['legend']));
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->element('contato'); ?>
