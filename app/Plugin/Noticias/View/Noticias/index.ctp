<div class="bgb-noticias">
    <?PHP echo $this->element('header_inner',array()); ?>
    
    <div class="container-fix cf-noticias">
        <h1>Notícias</h1>
        <?PHP
            $count = 1;
            echo '<div class="row noticias-more">';
                foreach ($posts as $noticia) {
                    $image = '';
                    if($noticia['Noticia']['imagem']){
                        if(file_exists('img/media_cache/crop/385x230/'.$noticia['Noticia']['imagem'].'')){
                            $image = $this->Html->image('media_cache/crop/385x230/'.$noticia['Noticia']['imagem'].'',array('alt'=>$noticia['Noticia']['title']));
                        }else{
                            $image = $this->Crop->image($noticia['Noticia']['imagem'],385,230,array('alt'=>$noticia['Noticia']['title']));
                        }
                    }

                    $description = $noticia['Noticia']['texto'];
                    if((strlen($noticia['Noticia']['texto'])) > 181){
                        $description = substr(strip_tags($noticia['Noticia']['texto']),0, 181).'...';
                    }

                    if($count === 1) echo '<div class="row">';
                    
                        echo '<div class="four columns box-noticia">';
                            echo $this->Html->link($image,array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false));
                            echo '<div class="row rowlow">';
                                echo $this->Html->link($noticia['Noticia']['title'],array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false,'class'=>'title'));
                                echo '<p>'.$description.'</p>';
                                echo '<div class="sline"><span></span></div>';
                                echo '<div class="row rmorea">';
                                    echo $this->Html->link('Ler mais',array('plugin'=>'noticias','controller'=>'noticias','action'=>'view','slug'=>$noticia['Noticia']['slug']),array('escape'=>false));
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    
                    if($count === 3){
                        echo '</div>';
                        $count = 0;
                    }
                    $count++;
                }
                if($count > 1 && $count <=3) echo '</div>';
            echo '</div>';
        ?>
    </div>
</div>
