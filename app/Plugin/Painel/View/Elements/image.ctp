<!--<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<?PHP
    if(!isset($label)){ 
        $label = 'Imagem destaque';
    }
    
    $data = $this->data;
    $data = array_shift($data);
    $path = (isset($data[$name]) && !empty($data[$name])) ? $data[$name]:'';
    $image = isset($path) && !empty($path) ? "/media/crop/100x100/$path" : 'Painel.noimage.png';

    if(isset($reduce) && $reduce === 'banner'){
        $reduce = $reduce;
    }else{
        $reduce = 'reduce';
    }

    $param1 = '';
    $param2 = '';
    $param3 = '';
    if(isset($name) && $name) {
        $param1 = $name;
    }
    if(isset($table) && $table) {
        $param2 = $table;
    }
    if(isset($data['id']) && $data['id']) {
        $param3 = $data['id'];
    }
?>

<div class="out-upload-image">
    <h5 class="card-title"><?PHP echo $label; ?></h5>
    <div class="file-upload">
        <!--<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Selecione a imagem</button>-->
        
        <?PHP if($path){  ?>
            <div class="file-upload-content" style="display: block !important;">
                <img class="file-upload-image" src="<?PHP echo $this->Html->url('/'.$path,true); ?>" alt="" />
                <div class="image-title-wrap">
                    <?PHP
                        echo $this->Form->hidden($name,array('value'=>$path));
                        if($param1 && $param2 && $param3){
                            echo $this->Html->link('<span class="remove-image">Apagar</span>',array('plugin'=>'painel','controller'=>'uploads','action'=>'delete_img',$param1,$param2,$param3,'?'=>array('path'=>$path)),array('escape'=>false),'Excluir Imagem?');
                        }
                    ?>
                </div>
            </div>
        <?PHP }else{ ?>
            <div class="image-upload-wrap" id="image-upload-wrap_<?PHP echo $name; ?>">
                <!--<input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />-->
                <?PHP 
                    echo $this->Form->input("$name-picker",array('type'=>'file','label'=>false,'data-extensions'=>'jpg,jpeg,png,gif','data-maxsize'=>8000,'reduce'=>$reduce,'id'=>$name,'class'=>'file-upload-input','accept'=>"image/*")); 
                    echo $this->Form->hidden($name,array('value'=>$path));
                ?>
                <div class="drag-text">
                    <h3>Arraste e solte ou selecione a imagem</h3>
                </div>
            </div>
        
            <div class="file-upload-content" id="file-upload-content_<?PHP echo $name; ?>">
                <img class="file-upload-image" id="file-upload-image_<?PHP echo $name; ?>" src="#" alt="" />
                <div class="image-title-wrap" id="file-upload-image_<?PHP echo $name; ?>">
                    <button type="button" class="remove-image" id="<?PHP echo $name; ?>">
                        Apagar <span class="image-title" id="image-title_<?PHP echo $name; ?>">Uploaded Image</span>
                    </button>
                </div>
            </div>
        <?PHP } ?>
    </div>
</div>