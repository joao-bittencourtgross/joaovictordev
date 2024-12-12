<section class="about-page-container">
    <div class="container">
        <div data-aos="fade-up" class="about-page">
            <h1>Sobre Mim</h1>
            <p><?php echo $post['Aempresa']['texto'] ?></p>
        </div>
        <div data-aos="fade-up" class="work-experience">
            <h1>Experiência Profissional</h1>
            <div class="experience">
                <?php foreach($experiencias as $experiencia) { ?>
                    <div class="row experience-row">
                        <div class="six columns">
                            <h2><?php echo $experiencia['Experiencia']['titulo'] ?></h2>
                            <span><?php echo $experiencia['Experiencia']['empresa'] ?></span>
                            <span class="experience-local"><?php echo $experiencia['Experiencia']['localizacao'] ?></span>
                        </div>
                        <div class="six columns">
                            <p><?php echo $experiencia['Experiencia']['tipo'] ?></p><br>
                            <span><?php echo $experiencia['Experiencia']['duracao'] ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div data-aos="fade-up" class="all-education">
            <h1>Educação</h1>
            <div class="education">
                <?php foreach($educacoes as $educacao) { ?>
                    <div class="row education-row">
                        <div class="six columns">
                            <h2><?php echo $educacao['Educacao']['titulo'] ?></h2>
                            <span><?php echo $educacao['Educacao']['instituicao'] ?></span>
                        </div>
                        <div class="six columns">
                            <p><?php echo $educacao['Educacao']['tipo'] ?></p><br>
                            <span><?php echo $educacao['Educacao']['duracao'] ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>