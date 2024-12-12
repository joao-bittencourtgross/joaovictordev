<section class="bg-sr bg-saa">
    <div class="container-fix">
        <h1><span>Saraiva de Rezende</span></h1>
        <div class="row">
            <div class="five columns columns sr-left">
                <?PHP echo $post['Aempresa']['texto_inicial']; ?>
                <div class="row line-img">
                    <?PHP echo $this->Html->image('line-sr.png',array('alt'=>'')); ?>
                </div>
                <h2><?PHP echo $post['Aempresa']['title_inicial']; ?></h2>
            </div>
            <div class="seven columns columns sr-right">
                <?PHP
//                    $video1 = array_shift($post['Video']);
//                    if(isset($video1['yid'])){
//                        echo '<iframe src="https://www.youtube.com/embed/'.$video1['yid'].'"></iframe>';
//                    }
                    if(isset($cache_cidade[$ccc]['Video'][0]['yid'])){
                        echo '<iframe src="https://www.youtube.com/embed/'.$cache_cidade[$ccc]['Video'][0]['yid'].'"></iframe>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<?PHP
    if(count($depoimentos) > 0){ 
        echo '<div class="container-fix saa-depoimentos">';
            echo '<div class="content-depoimentos">';
                foreach ($depoimentos as $depoimento) {
                    echo '<div>';
                        echo '<div class="box-dep">';
                            echo '<div class="bd-left">';
                                echo '<h3>'.$depoimento['Depoimento']['title'].'</h3>';
                                echo '<p>'.$depoimento['Depoimento']['cargo'].'</p>';
                            echo '</div>';
                            echo '<div class="bd-right">';
                                echo '<div class="row textod">';
                                    echo $depoimento['Depoimento']['texto'];
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    }
?>

<section class="bg-acima-expectativas" data-parallax="scroll" data-image-src="<?PHP echo $this->Html->url('/img/acima-das-expectativas.png',true); ?>">
    <div class="container-fix">
        <h3><span>Saraiva de Rezende</span> <span class="sa">acima</span> <span>das expectativas</span></h3>
    </div>
</section>

<div class="container-fix" id="diferenciais">
    <div class="row videos-diferencias">
        <?PHP
            echo '<h2>'.$post['Aempresa']['titulo_videos'].'</h2>';
            
//            pre($post);
            
            echo '<div class="fk-videos">';
                foreach ($post['Video'] as $video) {
                    echo '<div>';
                        echo '<div class="box-videos bv-content">';
                            echo '<div class="row img-default">';
                                echo $this->Html->link($this->Html->image($video['default']),'https://www.youtube.com/watch?v='.$video['yid'],array('escape'=>false,'class'=>'open-video')); 
                            echo '</div>';
    //                        echo '<div class="row title">';
    //                            echo $this->Html->link($video['Movie']['title'],'https://www.youtube.com/watch?v='.$video['Video'][0]['yid'],array('escape'=>false,'class'=>'open-video')); 
    //                        echo '</div>';
                            echo '<div class="row play">';
                                echo $this->Html->link('<span>'.$this->Html->image('play.svg',array('alt'=>'')).'</span>','https://www.youtube.com/watch?v='.$video['yid'],array('escape'=>false,'class'=>'open-video')); 
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        ?>
    </div>
</div>

<div class="bg-linha-do-tempo" id="linha-do-tempo">
    <div class="container-fix">
        <h3>Linha do tempo dos nossos empreendimentos</h3>
        <div class="row">
            <div class="slide-ldt">
                <?PHP
                    foreach ($linha_tempo as $ldt) {
                        if($ldt['Emprendimento']['imagem_subm']){
                            echo '<div>';
                                echo '<div class="box-ldt">';
                                    echo $this->Html->image('/'.$ldt['Emprendimento']['imagem_subm'],array('alt'=>$ldt['Emprendimento']['title']));
                                    echo '<p class="p1">'.$ldt['Emprendimento']['title'].'</p>';
                                    echo '<p class="p2">'.$ldt['Emprendimento']['status'].'</p>';
                                    echo '<p class="p3">'.$ldt['Emprendimento']['ano'].'</p>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="bg-mvv">
    <div class="container-fix">
        <div class="row">
            <div class="four columns">
                <h3>Missão</h3>
                <?PHP echo $post['Aempresa']['missao']; ?>
            </div>
            <div class="four columns">
                <h3>Visão</h3>
                <?PHP echo $post['Aempresa']['visao']; ?>
            </div>
            <div class="four columns">
                <h3>Valores</h3>
                <?PHP echo $post['Aempresa']['valores']; ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fix" id="premios">
    <div class="row row-premios">
        <h3>Prêmios que fortalecem nosso <br> compromisso com você</h3>
        <div class="imgs-p">
            <?PHP
//                pre($post);
                foreach ($post['Galleries']['images'] as $premio) {
                    echo $this->Html->image('/'.$premio['path'],array('alt'=>$premio['legend'],'title'=>$premio['legend']));
                }
            ?>
        </div>
    </div>
</div>

<section class="bg-noticias-home">
    <div class="container-fix">
        <div class="row">
            <div class="four columns nh-left">
                <h4>Novidades da Saraiva de Rezende</h4>
                <p>Acompanhe nossas últimas notícias e dicas para o seu Saraiva de Rezende</p>
            </div>
            <div class="eight columns nh-right">
                <div class="row">
                    <?PHP
                        foreach ($noticias as $noticia) {
//                             pre($noticia);  

                             $image = '';
                            if($noticia['Noticia']['imagem']){
                                if(file_exists('img/media_cache/crop/350x220/'.$noticia['Noticia']['imagem'].'')){
                                    $image = $this->Html->image('media_cache/crop/350x220/'.$noticia['Noticia']['imagem'].'',array('alt'=>$noticia['Noticia']['title']));
                                }else{
                                    $image = $this->Crop->image($noticia['Noticia']['imagem'],350,220,array('alt'=>$noticia['Noticia']['title']));
                                }
                            }
                            
                            $description = $noticia['Noticia']['texto'];
                            if((strlen($noticia['Noticia']['texto'])) > 111){
                                $description = substr(strip_tags($noticia['Noticia']['texto']),0, 111).'...';
                            }
            
                            echo '<div class="six columns noticia">';
                                echo $this->Html->link($image,array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false));
                                echo $this->Html->link($noticia['Noticia']['title'],array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false,'class'=>'title'));
                                echo $this->Html->link($description,array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false,'class'=>'description'));
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row view-all-nh">
            <?PHP echo $this->Html->link('Ver tudo <i class="fas fa-chevron-right"></i>',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'),array('escape'=>false)); ?>
        </div>
    </div>
</section>