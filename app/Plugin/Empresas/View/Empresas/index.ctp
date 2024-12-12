<div class="title-subpages">
    <div class="container-img-banner-subpages">
        <?php echo $this->Html->image('banner-subpages.png', array('alt'=>'Banner')) ?>
        <h1>Parceiros</h1>
    </div>
</div>

<section class="container-parceiros-subpages">
    <div class="container">
        <?php 
            $counter = 0;
            foreach ($posts as $empresa) {
                if ($counter % 3 == 0) {
                    if ($counter != 0) {
                        echo '</div>';
                    }
                    echo '<div class="row">';
                }

                echo '<div class="four columns box-parceiros-subpages">';
                    echo $this->Html->link(
                        $this->Html->image('/'.$empresa['Empresa']['imagem'], array('alt' => $empresa['Empresa']['title'])),
                        $empresa['Empresa']['link_site'],
                        array('target' => '_blank', 'escape' => false)
                    );
                echo '</div>';

                $counter++;
            }

            if ($counter % 3 != 0) {
                echo '</div>';
            }
        
        ?>
    </div>
</section>

<?php echo $this->element('contato'); ?>