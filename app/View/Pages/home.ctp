<main>

    <section id="sobre" class="about-section">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" class="eight columns">
                    <h1>
                        Olá 👋,<br>
                        Meu nome é<br>
                        <span>João Victor</span><br>
                        Eu construo coisas para a web
                    </h1>
                </div>
                <div data-aos="fade-left" class="four columns box-image-about">
                    <?php
                    if ($sobre['Aempresa']['imagem']) {
                        if (file_exists('img/media_cache/crop/300x300/' . $sobre['Aempresa']['imagem'] . '')) {
                            $image = $this->Html->image('media_cache/crop/300x300/' . $sobre['Aempresa']['imagem'] . '', array('alt' => 'Imagem de perfil'));
                        } else {
                            $image = $this->Crop->image($sobre['Aempresa']['imagem'], 300, 300, array('alt' => 'Imagem de perfil'));
                        }
                    }
                    ?>

                    <?php echo $image ?>
                </div>
            </div>
        </div>
    </section>

    <section id="tecnologias" class="tech-stack">
        <div class="container">
            <h1>Minha pilha de tecnologias</h1>
            <p>Tecnologias com quais trabalhei recentemente</p>
            <div data-aos="zoom-in" class="flex-stack">
                <?php
                foreach ($tecnologias as $tecnologia) {
                    echo $this->Html->image('/' . $tecnologia['Certificacao']['imagem'], array('alt' => $tecnologia['Certificacao']['titulo']));
                }
                ?>
            </div>
        </div>
    </section>

    <section id="projetos" class="projects">
        <div class="container">
            <h1>Projetos</h1>
            <p>Coisas que construí até agora</p>
            <?php
            $count = 1;
            foreach ($projetos as $projeto) {
                $image = '';
                if ($projeto['Produto']['imagem']) {
                    if (file_exists('img/media_cache/crop/375x260/' . $projeto['Produto']['imagem'] . '')) {
                        $image = $this->Html->image('media_cache/crop/375x260/' . $projeto['Produto']['imagem'] . '', array('alt' => $projeto['Produto']['titulo']));
                    } else {
                        $image = $this->Crop->image($projeto['Produto']['imagem'], 375, 260, array('alt' => $projeto['Produto']['titulo']));
                    }
                }

                if ($count === 1) echo '<div class="row">';

                echo '<div data-aos="flip-left" class="four columns box-projects">';
                echo '<div class="projects-img">';
                echo $image;
                echo '</div>';
                echo '<div class="projects-text">';
                echo '<h1>' . $projeto['Produto']['titulo'] . '</h1>';
                echo $projeto['Produto']['descricao'];
                echo '<span>Tecnologias: ' . $projeto['Produto']['subtitulo'] . '</span>';
                echo '<div class="row">';
                switch ($projeto['Produto']['categoria']) {
                    case 0:
                        echo '<div class="twelve columns">';
                        echo $this->Html->link('<i class="fas fa-link"></i>Ver Projeto', $projeto['Produto']['link'], array('escape' => false, 'target' => '_blank'));
                        echo '</div>';
                        break;
                    case 1:
                        echo '<div class="twelve columns">';
                        echo $this->Html->link('<i class="fab fa-github"></i>Ver Código', $projeto['Produto']['github'], array('escape' => false, 'target' => '_blank'));
                        echo '</div>';
                        break;
                    case 2:
                        echo '<div class="six columns">';
                        echo $this->Html->link('<i class="fas fa-link"></i>Ver Projeto', $projeto['Produto']['link'], array('escape' => false, 'target' => '_blank'));
                        echo '</div>';
                        echo '<div class="six columns">';
                        echo $this->Html->link('<i class="fab fa-github"></i>Ver Código', $projeto['Produto']['github'], array('escape' => false, 'target' => '_blank'));
                        echo '</div>';
                        break;
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';

                if ($count === 3) {
                    echo '</div>';
                    $count = 0;
                }
                $count++;
            }
            ?>
        </div>
    </section>

</main>