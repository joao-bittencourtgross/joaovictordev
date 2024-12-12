<div class="title-subpages">
    <div class="container-img-banner-subpages">
        <?php echo $this->Html->image('banner-subpages.png', array('alt'=>'Banner')) ?>
        <h1>Certificações</h1>
    </div>
</div>

<section class="container-certificacoes-subpages">
    <div class="container">
        <div class="row slide-certificacoes">
            <?php
                foreach ($posts as $certificacao) {
                    echo "<div class='box-certificacoes'>";
                        echo $this->Html->link($this->Html->image('/'.$certificacao['Certificacao']['imagem'], array('alt'=>$certificacao['Certificacao']['titulo'])), '/'.$certificacao['Certificacao']['imagem'], array('escape'=>false));
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</section>

<?php echo $this->element('contato'); ?>