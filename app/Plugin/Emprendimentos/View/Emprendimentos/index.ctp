<div class="title-subpages">
    <h1>Nossos Empreendimentos <span></span></h1>
</div>

<section class="container-all-emps">
    <div class="container emps">
    <span class="line-all-emps"></span>
    <h1>Excelência do planejamento<br> até a entrega final.</h1>
    <p>Conheça em detalhes todos os nossos empreendimentos</p>
    <?php 
        $counter = 0;
        foreach($destaques as $emprendimento) {

            if($emprendimento['Emprendimento']['imagem_miniatura']){
                if(file_exists('img/media_cache/crop/368x357/'.$emprendimento['Emprendimento']['imagem_miniatura'].'')){
                    $image = $this->Html->image('media_cache/crop/368x357/'.$emprendimento['Emprendimento']['imagem_miniatura'].'',array('alt'=>$emprendimento['Emprendimento']['title']));
                }else{
                    $image = $this->Crop->image($emprendimento['Emprendimento']['imagem_miniatura'],368,357,array('alt'=>$emprendimento['Emprendimento']['title']));
                }
            }

            if ($counter >= 3 && $counter % 3 == 0) {
                if ($counter > 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            } else if ($counter % 3 == 0) {
                if ($counter > 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }

            echo '<div class="four columns box-emp">';
            echo $this->Html->link(
                '<div class="img-emp">
                    '.$image.'
                    '.$this->Html->image('filternovo.svg', array('class'=>'filter-img')).'
                    <span>Ver mais detalhes</span>
                </div>
                <div class="row">
                    <h5>'.$emprendimento['Emprendimento']['title'].'</h5>
                    <p>'.$emprendimento['Emprendimento']['cidade'].' / '.$emprendimento['Cidade']['estado_title'].'</p>
                    '.$this->Html->link('Conheça o empreendimento', array('plugin'=>'emprendimentos', 'controller' => 'emprendimentos', 'action' => 'view', 'slug'=>$emprendimento['Emprendimento']['slug'], 'emp'=>$emprendimento['Emprendimento']['id']), array('class'=>'btn-view-emp')).'
                </div>',
                ['plugin'=>'emprendimentos', 'controller' => 'emprendimentos', 'action' => 'view', 'slug'=>$emprendimento['Emprendimento']['slug'], 'emp'=>$emprendimento['Emprendimento']['id']],
                ['escape' => false]
            );
            echo '</div>';


            $counter++;
        }
        echo '</div>';
        
        ?>
    </div>
</section>

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

