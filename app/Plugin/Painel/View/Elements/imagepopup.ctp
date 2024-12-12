<?PHP
if(!isset($label)) $label="Imagem destaque";
$data=$this->data;
$data=array_shift($data);
$path=(isset($data[$name]) && !empty($data[$name])) ? $data[$name]:'';
$image=isset($path) && !empty($path) ? "/media/crop/100x100/$path" : 'Painel.noimage.png';

if(isset($reduce) && $reduce === 'banner'){
    $reduce = $reduce;
}else{
    $reduce = 'reduce';
}

$param1 = '';
$param2 = '';
$param3 = '';
if(isset($name) && $name) 
    $param1 = $name;
if(isset($table) && $table) 
    $param2 = $table;
if(isset($id_table) && $id_table) 
    $param3 = $id_table;
?>

<div class="ls-alert-box ls-dismissable col-md-10" id="box-image">
    <header class="ls-info-header">
        <h2 class="ls-title-6"><?=$label?></h2>
    </header>
    <fieldset class="box image file" data-name="<?=$name?>">
        <?PHP
            if($param1 && $param2 && $param3)
                echo $this->Html->link('<span class="delete_image" title="Excluir Imagen?"></span>',array('plugin'=>'painel','controller'=>'uploads','action'=>'delete_img',$param1,$param2,$param3),array('escape'=>false),'Excluir Imagen?');
            
            echo $this->Form->input("$name-picker",array('type'=>'file','label'=>'Selecione uma imagem','data-extensions'=>'jpg,png,gif','data-maxsize'=>8000,'reduce'=>$reduce));
            echo '<br><br>';
            echo $this->Form->hidden($name,array('value'=>$path));
            
            if($path){
                echo $this->Html->link($this->Html->image($image),'/'.$path,array('escape'=>false,'class'=>'imgaref','target'=>'_blank'));
            }else{
               echo $this->Html->image($image); 
            }
//            echo '<div id="progress"><div class="loading"></div></div>';
//            echo '<div id="load-image-single">'.$this->Html->image('painel/ajax-loader.gif',array('alt'=>'Aguarde','title'=>'Aguarde')).' Aguarde... </div>';
            echo '<div id="load-image-single"></div>';
        ?>
    </fieldset>
</div>

<style>
    .imgaref {
        border-bottom-style: none !important;
    }
</style>

<!--<fieldset class="box image file" data-name="<?=$name?>">
    <legend><?PHP echo $label; ?></legend>
    <?PHP
//        if($param1 && $param2 && $param3){
//            echo $this->Html->link('<span class="delete_image" title="Excluir Imagen?"></span>',array('plugin'=>'painel','controller'=>'uploads','action'=>'delete_img',$param1,$param2,$param3),array('escape'=>false),'Excluir Imagen?');
//        }
//        
//        echo $this->Form->input("$name-picker",array('type'=>'file','label'=>'Selecione uma imagem','data-extensions'=>'jpg,png,gif','data-maxsize'=>8000,'reduce'=>$reduce));
//        echo $this->Form->hidden($name,array('value'=>$path));
//        echo $this->Html->image($image);
//        echo '<div id="progress"><div class="loading"></div></div>';
    ?>
</fieldset>-->