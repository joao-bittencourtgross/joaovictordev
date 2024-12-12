<div class="title-subpages">
    <h1><?php echo $post['Emprendimento']['title'] ?> <span></span></h1>
</div>

<section class="container-banner-emp-view">
    <div class="banner-emp-view">
        <?php echo $this->Html->image('/'.$post['Emprendimento']['imagem']); ?>
        <div class="nav-banner-emp-view">
            <nav>
                <ul>
                    <li><a href="#o_empreendimento">O empreendimento</a></li>
                    <li><a href="#infraestrutura">Infraestrutura</a></li>
                    <li><a href="#galeria">Galeria de imagens</a></li>
                    <li><a href="#progresso">Andamento da obra</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<section id="o_empreendimento" class="container-about-emp">
    <div class="container text-about-emp">
        <div class="row">
            <div class="six columns">
                <span></span>
                <h1>O empreendimento</h1>
                <p class="p-dourado"><?php echo $post['Emprendimento']['title'] ?></p>
                <p class="p-dourado"><?php echo $post['Emprendimento']['cidade'].' / '.$post['Cidade']['estado_title'] ?></p>
            </div>
            <div class="infos-emp six columns">
                <?php if (!empty($post['Emprendimento']['area_total'])): ?>
                    <div class="four columns">
                        <p class="p-azul p-areatotal">Área total</p>
                        <p class="info"><?php echo $post['Emprendimento']['area_total'] ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($post['Emprendimento']['qtd_lotes'])): ?>
                    <div class="four columns">
                        <p class="p-azul p-qtdlotes">Qtd. de Lotes</p>
                        <p class="info"><?php echo $post['Emprendimento']['qtd_lotes'] ?></p>
                    </div>
                <?php endif; ?>
                <?php if (!empty($post['Emprendimento']['area_lotes'])): ?>
                    <div class="four columns">
                        <p class="p-azul p-arealotes">Área dos lotes</p>
                        <p class="info"><?php echo $post['Emprendimento']['area_lotes'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <p class="text-about-emp-p"> 
            <?php echo $post['Emprendimento']['texto'] ?>
        </p>
    </div>
</section>

<?php if (isset($diferenciais ) && !empty($diferenciais)): ?>

    <section id="infraestrutura" class="container container-infra-emp">
        <span></span>
        <h1>Infraestrutura</h1>
        <div class="infra-emp">
                <?php 
                $counter = 0;
                foreach($diferenciais as $diferencial) {

                    if ($counter % 3 == 0) {
                        if ($counter > 0) {
                            echo '</div>';
                        }
                        echo '<div class="row">';
                    }

                    echo '<div class="four columns infra-emp-list">';
                    if (!empty($diferencial['DiferencialEmp']['imagem'])) {
                        echo '<div class="flex-view-infra">';
                            echo '<p>'.$diferencial['DiferencialEmp']['title'].'</p>';
                            echo $this->Html->image('/'.$diferencial['DiferencialEmp']['imagem']);
                        echo '</div>';
                    } else{
                        echo '<p>'.$diferencial['DiferencialEmp']['title'].'</p>';
                    }
                    echo '<ul>';
                        foreach($diferencial['DiferencialEmpOpc'] as $opc) {
                            echo '<li>'.$opc['title'].'</li>';
                        }
                    echo '</ul>';
                    echo '</div>';
                    $counter++;
                }
                echo '</div>';
                ?>
        </div>
    </section>

<?php endif; ?>

<?php if (isset($post['Galleries']['images']) && !empty($post['Galleries']['images'])): ?>
    <section id="galeria" class="container container-gallery-emp">
        <span class="line-gallery-view"></span>
        <h1>Galeria de Imagens</h1>
        <div class="gallery-emp">
            <?php  

                $counter = 0;
                foreach($post['Galleries']['images'] as $key => $image) {

                    if ($counter % 5 == 0) {
                        if ($counter > 0) {
                            echo '</div>';
                        }
                        echo '<div class="row row-two-gallery-emp"">';
                    }
                    echo '<div class="three columns box-img-gallery">';
                    echo $this->Html->link(
                        $this->Html->image('/'.$image['path']) .
                        $this->Html->image('azulgallery.svg', array('class'=>'filter-img')) .
                        '<span>Ampliar</span>',
                        '/'.$image['path'],
                        array('escape' => false)
                    );
                    echo '</div>';
                    $counter++;
                }
                if ($counter > 0) {
                    echo '</div>';
                }
            
            ?>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($progressos) && !empty($progressos)): ?>
    <section id="progresso" class="container container-progress-emp">
        <span></span>
        <h1>Andamento da Obra</h1>
        <div>
        <?php 
        $counter = 0;
        foreach($progressos as $progresso) {
            if ($counter % 2 == 0) {
                if ($counter > 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }
            echo '<div class="six columns progress-emp">';
            echo    '<p>'.$progresso['ProgressoEmp']['title'].'</p>';
            echo     '<div class="progress-bar">';
            echo           '<div class="bar-orange" style="width: '.$progresso['ProgressoEmp']['valor'].'%">';
            echo             '<p class="text-bar">'.$progresso['ProgressoEmp']['valor'].'%</p>';
            echo           ' </div>';
            echo     '</div>';
            echo '</div>';
            $counter++;
        }
        echo '</div>';
    ?>
        </div>
    </section>
<?php endif; ?>

<div class="contact-emps">
    <section class="container-contact container">
        <div class="row">
            <div class="img-contact six columns">
                <span></span>
                <h1>Gostou?<br> Fale conosco para mais informações</h1>
                <?php echo $this->Html->image('contact.png') ?>
            </div>
            <div class="form-contact six columns">
                <form action="<?= $this->Html->url('/fale-conosco',true); ?>" method="post">
                    <input type="text" name="data[Contato][nome]" placeholder="Nome Completo" required>
                    <input type="email" name="data[Contato][email]" placeholder="Seu e-mail de uso diário" required>
                    <input type="text" name="data[Contato][telefone]" placeholder="Telefone (Whatsapp)" onkeyup="mascara(this,mtel)" required>
                    <textarea name="data[Contato][mensagem]" id="mensagem" cols="30" rows="10" placeholder="Deixe sua mensagem" required></textarea>
                    <input type="submit" value="Enviar Mensagem">
                </form>
            </div>
        </div>
    </section>
</div>

    