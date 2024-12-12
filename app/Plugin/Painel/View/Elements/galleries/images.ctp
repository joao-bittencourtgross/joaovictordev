<?PHP
$GLOBALS['_upload_id']=isset($GLOBALS['_upload_id'])?$GLOBALS['_upload_id']:0;
if (!isset($label)) $label = __("Galeria de imagens");
if(!isset($group)) $group='images';
if(!isset($extensions)) $extensions='jpg,png,gif,jpeg';
if(!isset($path)) $path='img/galleries/all';
?>

<fieldset class="box file gallery-images">
    <legend><?= $label ?></legend>

    <?PHP
    echo $this->Form->input("images-picker", array(
        'type' => 'file',
        'label' => 'Selecione imagens',
        'multiple' => true,
        'id' => "$group-picker",
        'data-gallery-type'=>'images',
        'data-gallery-group'=>$group,
        'data-maxsize'=>8000,
        'data-extensions'=>'jpg,png,gif,jpeg',
        'data-upload-path'=>$path,
    ));
    ?>

    <div class="items sortable">
        
        <?PHP
        if(isset($this->data['Attachment'][$group])):
            foreach($this->data['Attachment'][$group] as $image):
                $upload_id=$GLOBALS['_upload_id'];
                $item=array();
                $item[]=$this->Html->link('X','javascript:void(0)',array('class'=>'delete-button','data-delete-id'=>$image['id']));
                $item[]=$this->Crop->image($image['path'],100,100);
                $item[]=$this->Form->hidden("Attachment.$group.$upload_id.id",array('value'=>$image['id']));
                $item[]=$this->Form->hidden("Attachment.$group.$upload_id.path",array('value'=>$image['path']));
                echo $this->Html->tag('div',implode("\n",$item),array('escape'=>false,'class'=>'item','data-upload-id'=>$upload_id));
                $GLOBALS['_upload_id']++;
            endforeach;
        endif;
        ?>
        
    </div>
</fieldset>