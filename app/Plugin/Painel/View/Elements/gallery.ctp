<?PHP
if(!isset($label)) $label="Galeria de imagens";
if(!isset($gallery)) $gallery="images";

$GLOBALS['_uploadID']=isset($GLOBALS['_uploadID'])?$GLOBALS['_uploadID']:0;

//$_uploadID=isset($_uploadID)?$_uploadID:0;
?>

<div class="box-gallery" id="box-image">
    <h5 class="card-title"><?PHP echo $label; ?></h5>
    
    <div class="box images file" data-gallery="<?PHP echo $gallery?>">
        <?PHP
            echo $this->Form->input("$gallery-picker",array(
                'type'=>'file',
                'multiple'=>true,
                'label'=>'Selecione as imagens',
                'data-extensions'=>'jpg,jpeg,png,gif',
                'data-maxsize'=>8000
            ));
        ?>

        <br>
        <div class="items">
            <?PHP
            if(isset($this->data['Galleries'][$gallery])):
                $galeria=$this->data['Galleries'][$gallery];
                foreach($galeria as $v){
                    if($v['gallery'] != $gallery) continue;
                    $image=$this->Crop->image($v['fullPath'],100,100,array('alt'=>$v['legend']));
                    $output=$this->Html->link($image,$v['fullPath'],array('class'=>'fancybox','data-fancybox-group'=>'gallery','escape'=>false,'title'=>$v['legend']));
                    $class='photoLegenda';
                    if($v['legend']) $class.= ' active';
                    $output.=$this->Html->link('<span>Legenda</span>','#',array('escape'=>false,'id'=>$v['id'],'class'=>$class,'title'=>$v['legend']));
                    $output.=$this->Html->link('x','javascript:void(0);',array('class'=>'delete'));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.id",array('value'=>$v['id']));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.fullPath",array('value'=>$v['fullPath']));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.gallery",array('value'=>$v['gallery']));
                    echo $this->Html->tag('div',$output,array('class'=>'item','data-upload-id'=>$GLOBALS['_uploadID']));
                    $GLOBALS['_uploadID']++;
                }
            elseif(isset($this->data['Gallery'])):
                $galeria=$this->data['Gallery'];
                foreach($galeria as $v){
                    if($v['gallery'] != $gallery) continue;
                    $image=$this->Crop->image($v['fullPath'],100,100,array('alt'=>$v['legend']));
                    $output=$this->Html->link($image,$v['fullPath'],array('class'=>'fancybox','data-fancybox-group'=>'gallery','escape'=>false,'title'=>$v['legend']));
                    $class='photoLegenda';
                    if($v['legend']) $class.= ' active';
                    $output.=$this->Html->link('<span>Legenda</span>','#',array('escape'=>false,'id'=>$v['id'],'class'=>$class));
                    $output.=$this->Html->link('x','javascript:void(0);',array('class'=>'delete'));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.id",array('value'=>$v['id']));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.fullPath",array('value'=>$v['fullPath']));
                    $output.=$this->Form->hidden("Gallery.{$GLOBALS['_uploadID']}.gallery",array('value'=>$v['gallery']));
                    echo $this->Html->tag('div',$output,array('class'=>'item','data-upload-id'=>$GLOBALS['_uploadID']));
                    $GLOBALS['_uploadID']++;
                }
            endif;
            ?>

        </div>

        <script>
            if(_uploadID) _uploadID=<?PHP echo $GLOBALS['_uploadID']?>;
            else var _uploadID=<?PHP echo $GLOBALS['_uploadID']?>
        </script>

    </div>
</div>



<!--<script type="text/javascript">
    jQuery(function($){
        $('.fancybox').fancybox();        
    });
</script>-->