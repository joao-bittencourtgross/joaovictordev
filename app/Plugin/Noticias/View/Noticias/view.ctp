<?PHP 
    echo $this->element('header');
     
//    pre($post);
    if($post['Noticia']['banner']){
        echo '<div class="banner-noticia">';
            echo $this->Html->image('/'.$post['Noticia']['banner'],array('alt'=>$post['Noticia']['title']));
        echo '</div>';
    }
?>

<div class="container-fix view-vnoticia">
    <h1><?PHP echo $post['Noticia']['title'] ?></h1>
    <div class="row texto">
        <?PHP echo $post['Noticia']['texto'] ?>
    </div>
    <?PHP
        if (count($post['Galleries']) > 0) {
            echo '<div class="row bg-gallery">';
                $count = 1;
                foreach ($post['Galleries']['images'] as $gallery) {
                    if(file_exists('img/media_cache/crop/270x170/'.$gallery['path'].'')){
                        $img = $this->Html->image('media_cache/crop/270x170/'.$gallery['path'].'',array('alt'=>$gallery['legend']));
                    }else{
                        $img = $this->Crop->image($gallery['path'],270,170,array('alt'=>$gallery['legend']));
                    }

                    if($count === 1) echo '<div class="row galeria">';
                        echo '<div class="three columns ig">';
                            echo $this->Html->link($img,'/'.$gallery['path'],array('escape'=>false,'title'=>$gallery['legend']));
                        echo '</div>';
                    if($count === 4){
                        echo '</div>';
                        $count = 0;
                    }
                    $count++;
                }
                if($count > 1 && $count <=4) echo '</div>';
            echo '</div>';
        }

        if(count($post['Video']) > 0){
            foreach ($post['Video'] as $video) {
                echo '<div class="row video">';
                    if($video['title']){
                        echo '<p>'.$video['title'].'</p>';
                    }
                    echo '<iframe src="https://www.youtube.com/embed/'.$video['yid'].'"></iframe> ';
                echo '</div>';
            }
        }
        
        echo $this->element('fale_conosco_new');
    ?>
</div>



