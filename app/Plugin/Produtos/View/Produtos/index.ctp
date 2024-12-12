<div class="title-subpages">
    <div class="container-img-banner-subpages">
        <?php echo $this->Html->image('banner-subpages.png', array('alt'=>'Banner')) ?>
        <h1>Produtos</h1>
    </div>
</div>

<div class="container container-max-width-navigation-products">
    <div class="row">
        <aside class="navigation-products-aside four columns">
            <div class="navigation-products">
                <nav>
                    <ul>
                        <li class="<?php echo (empty($this->params->categoria)) ? 'n-p-active' : ''; ?>">
                            <?php echo $this->Html->link('Todos os produtos', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index')) ?>
                        </li>
                        <li class="<?php echo ($this->params->categoria == 'Filme polietileno') ? 'n-p-active' : ''; ?>">
                            <?php echo $this->Html->link('Filme polietileno', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index', 'categoria' => 'Filme polietileno')) ?>
                        </li>
                        <li class="<?php echo ($this->params->categoria == 'Sacos e Folhas Plásticas') ? 'n-p-active' : ''; ?>">
                            <?php echo $this->Html->link('Sacos e Folhas Plásticas', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index', 'categoria' => 'Sacos e Folhas Plásticas')) ?>
                        </li>
                        <li class="<?php echo ($this->params->categoria == 'Fios Poliéster') ? 'n-p-active' : ''; ?>">
                            <?php echo $this->Html->link('Fios Poliéster', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index', 'categoria' => 'Fios Poliéster')) ?>
                        </li>
                        <li class="<?php echo ($this->params->categoria == 'Vestimentas Descartáveis') ? 'n-p-active' : ''; ?>">
                            <?php echo $this->Html->link('Vestimentas Descartáveis', array('plugin' => 'produtos', 'controller' => 'produtos', 'action' => 'index', 'categoria' => 'Vestimentas Descartáveis')) ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    
        <section class="container-products-subpages eight columns">
            <?php 
                $counter = 0;
                foreach ($posts as $produto) {
    
                    $img = '';
                    if($produto['Produto']['imagem']){
                        if(file_exists('img/media_cache/crop/260x205/'.$produto['Produto']['imagem'].'')){
                            $img = $this->Html->image('media_cache/crop/260x205/'.$produto['Produto']['imagem'].'',array('alt'=>$produto['Produto']['titulo']));
                        }else{
                            $img = $this->Crop->image($produto['Produto']['imagem'],260,205,array('alt'=>$produto['Produto']['titulo']));
                        }
                    }
    
                    if($counter % 3 == 0){
                        echo '<div class="row">';
                    }
                        echo '<div class="box-products four columns">';
                            echo $this->Html->link(
                                '<div class="u-full-width">' .
                                    $img .
                                '</div>' .
                                '<div class="u-full-width">' .
                                    '<h2>'.$produto['Produto']['titulo'].'</h2>' .
                                    '<h3>'.$produto['Produto']['subtitulo'].'</h3>' .
                                '</div>',
                                array('plugin'=>'produtos', 'controller'=>'produtos', 'action'=>'view', 'slug'=>$produto['Produto']['slug']),
                                array('escape' => false)
                            );
                        echo '</div>';
                    
                    if($counter % 3 == 2){
                        echo '</div>';
                    }
    
                    $counter++;
                }
            ?>
        </section>
    </div>
</div>



<?php echo $this->element('contato'); ?>