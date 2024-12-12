<?PHP
if(!isset($label)) $label="Downloads";
$options=array('type'=>'file','div'=>'topbar-file','label'=>'Selecione um arquivo');
if(isset($extensions)) $options['data-extensions']=$extensions;
?>

<fieldset class="box downloads image">
    <legend><?PHP echo $label?></legend>
    <?PHP echo $this->Form->input('download-picker',$options); ?>
    
    <div class="items">
        <?PHP
        if(isset($this->data['Download']) && !empty($this->data['Download'])){
            $i=0;
            foreach($this->data['Download'] as $download):
                $id=$download['id'];
                $name=$download['name'];
                $title=$download['title'];
                $extension=strtolower(pathinfo($name,PATHINFO_EXTENSION));
                $path=$download['path'];
            ?>
        
            <div class="item <?PHP echo $extension?>" data-id="<?PHP echo $id?>" data-path="<?PHP echo $path?>">
                <a class="delete" href="javascript:void(0);">x</a>
                <label><?PHP echo $name?></label>
                <input type="text" name="data[Download][<?PHP echo $i?>][title]" placeholder="Digite um título para o arquivo" value="<?PHP echo $title?>">
                <input class="hidden id" type="hidden" name="data[Download][<?PHP echo $i?>][id]" value="<?PHP echo $id?>">
                <input class="hidden name" type="hidden" name="data[Download][<?PHP echo $i?>][name]" value="<?PHP echo $name?>">
                <input class="hidden path" type="hidden" name="data[Download][<?PHP echo $i?>][path]" value="<?PHP echo $path?>" />
            </div>        
            <?PHP
            $i++;
            endforeach;
            
        }
        ?>
    </div>
    
</fieldset>