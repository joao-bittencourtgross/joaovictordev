<?PHP
$GLOBALS['_upload_id']=isset($GLOBALS['_upload_id'])?$GLOBALS['_upload_id']:0;
if (!isset($label)) $label = __("Galeria de imagens");
if(!isset($group)) $group='files';
if(!isset($extensions)) $extensions='doc,docx,xls,xlsx,ppt,pptx,pdf,txt,zip,rar,ai,cdr,eps,jpg';
if(!isset($path)) $path='assets/files/all';
?>

<fieldset class="box file gallery-files">
    <legend><?= $label ?></legend>

    <?PHP
    echo $this->Form->input("files-picker", array(
        'type' => 'file',
        'label' => 'Selecione arquivos',
        'multiple' => true,
        'id' => "$group-picker",
        'data-gallery-type'=>'files',
        'data-gallery-group'=>$group,
        'data-maxsize'=>8000,
        'data-extensions'=>$extensions,
        'data-upload-path'=>$path,
    ));
    ?>

    <div class="items sortable">
        
        <?PHP
        if(isset($this->data['Attachment'][$group])):
            foreach($this->data['Attachment'][$group] as $file):
                $upload_id=$GLOBALS['_upload_id'];
                $extension=strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
                $item=array();
                $item[]=$this->Html->link('X','javascript:void(0)',array('class'=>'delete-button','data-delete-id'=>$file['id']));
                $item[]=$this->Html->tag('div',$file['name'],array('class'=>'title'));
                $item[]=$this->Form->input("Attachment.$group.$upload_id.title",array('div'=>false,'label'=>false,'placeholder'=>'Título do arquivo','value'=>$file['title']));
                $item[]=$this->Form->hidden("Attachment.$group.$upload_id.id",array('value'=>$file['id']));
                $item[]=$this->Form->hidden("Attachment.$group.$upload_id.name",array('value'=>$file['name']));
                echo $this->Html->tag('div',implode("\n",$item),array('escape'=>false,'class'=>"item $extension",'data-upload-id'=>$upload_id));
                $GLOBALS['_upload_id']++;
            endforeach;
        endif;
        ?>
        
    </div>
</fieldset>