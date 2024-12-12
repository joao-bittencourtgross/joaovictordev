<div class="title-subpages">
    <div class="container-img-banner-subpages">
        <?php echo $this->Html->image('banner-subpages.png', array('alt'=>'Banner')) ?>
        <h1>Trabalhe conosco</h1>
    </div>
</div>


<?PHP if(isset($add_sucess) && $add_sucess){ ?>

    <div class="container-fix">
        <div class="msg-add-sucess"> 
            Currículo enviado com sucesso.
        </div>
    </div>

    <script>
        setTimeout(function(){ 
            window.location.href='<?= $this->Html->url('/',true); ?>';
        },5388);
    </script>
    
<?PHP 
    }else{ 
?>

    <section class="container-vagas-subpages">
        <div class="container">
            <h1>Vagas</h1>
            <?php
                foreach ($vagas as $vaga) {
                    echo "<div class='u-full-width'>";
                        echo "<div class='box-vagas'>";
                            echo "<h2>".$vaga['Vaga']['title']."</h2>";
                            echo "<span></span>";
                            echo "<a class='btn-view-more-vagas' href='#'>Descrição <i class='fas fa-angle-down'></i></a>";
                        echo "</div>";
                        echo "<div class='box-vagas-descricao view-more-vagas'>";
                            echo "<p>".$vaga['Vaga']['descricao']."</p>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>

    <section class="container-contact">
        <div class="container">
            <div class="row">
                <div class="text-contact six columns">
                    <h1>Trabalhe<br> na WBS</h1>
                    <p>Caso não tenha uma vaga específica em<br> aberto nos envie o seu currículo para o nosso<br> banco de talentos.</p>
                </div>
                <div class="form-contact six columns">
                    <?php echo $this->Form->create('Trabalhe', array('type' => 'file', 'url' => array('plugin'=>'contatos', 'controller' => 'trabalhe', 'action' => 'index'))); ?>
                        <input type="text" name="data[Trabalhe][nome]" placeholder="Nome" required>
                        <input type="text" name="data[Trabalhe][telefone]" placeholder="Telefone" onkeyup="mascara(this,mtel)" required>
                        <input type="email" name="data[Trabalhe][email]" placeholder="E-mail" required>
                        <div class="row">
                            <div class="six columns">
                                <input type="text" name="data[Trabalhe][cidade]" placeholder="Cidade" required>
                            </div>
                            <div class="six columns">
                                <input type="text" name="data[Trabalhe][estado]" placeholder="Estado" required>
                            </div>
                        </div>
                        <textarea name="data[Trabalhe][mensagem]" id="mensagem" cols="30" rows="10" placeholder="Mensagem" required></textarea>
                        <div class="flex-form-contact">
                            <input type="checkbox" name="data[Trabalhe][privacidade]" id="privacidade" value="1">
                            <label for="privacidade">Declaro que li e concordo com a <?php echo $this->Html->link('Política de Privacidade e Termos de Uso', array('plugin'=>'termo', 'controller'=>'termo', 'action'=>'politica'))?></label>
                        </div>
                        <div class="row">
                            <div class="six columns">
                                <input type="file" name="data[Trabalhe][curriculo]" id="curriculo">
                                <label class="label-file" for="curriculo">Anexe seu currículo</label>
                            </div>
                            <div class="six columns">
                                <input class="submit-trabalhe" type="submit" value="Enviar">
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </section>

<?PHP } ?>

