<?PHP
if(!isset($label)) $label=__("Galeria de vídeos");
?>

<div class="ls-alert-box ls-dismissable col-md-10" id="box-image">
    <header class="ls-info-header">
        <h2 class="ls-title-6"><?PHP echo $label; ?></h2>
    </header>
    
    <fieldset class="box image videos">
        <nav class="buttons">
            <a href="javascript:void(0);" class="selector"><?=__("Adicionar vídeo do youtube")?></a>
        </nav>
        <br>
        <div class="items">
            <?PHP
            //pre($this->data);
            if(isset($this->data['Video']) && !empty($this->data['Video'])){
                $i=0;
                foreach($this->data['Video'] as $v):
            ?>
            <div class="item" id="itemv">
                <a class="remove" href="javascript:void(0);">x</a>
                <img src="//i2.ytimg.com/vi/<?=$v['yid']?>/hqdefault.jpg" height="100">
                <!--<input type="text" name="data[Video][<?PHP // echo $i; ?>][title]" placeholder="Título do vídeo" value="<?PHP // echo $v['title']; ?>">-->
                <input type="hidden" name="data[Video][<?=$i?>][yid]" value="<?=$v['yid']?>">
            </div>
            <?PHP
                $i++;
                endforeach;
            }
            ?>
        </div>
    </fieldset>
    <br>
</div>

<?PHP
// http://i4.ytimg.com/vi/KTYD_kN7rPg/hqdefault.jpg

?>