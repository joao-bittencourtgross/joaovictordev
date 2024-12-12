<?PHP //
$this->Html->script("Painel./valums/fileuploader.js",array('inline'=>false));
$this->Html->script("Painel./js/jquery.sortable.js",array('inline'=>false));
$this->Html->css('Painel./css/uploader', false, array('inline' => false));

$galleriesc=(isset($galleriesc))?$galleriesc++:1;
$data=$this->data;
$data=array_shift($data);

//UNIQUE ID
/*
$newdata=$this->data;
$pdata=array_shift($newdata);
$pid = uniqid();
$uid = isset($pdata['uid']) ? $pdata['uid'] : uniqid();
echo $this->Form->hidden('uid', array('value' => $uid));
 * 
 */
//END OF UNIQUE ID

$delete=$this->Html->url(array('controller'=>'uploads','action'=>'admin_delete','plugin'=>'painel'));
$legend=$this->Html->url(array('controller'=>'uploads','action'=>'admin_title','plugin'=>'painel'));
$cover=$this->Html->url(array('controller'=>'uploads','action'=>'admin_cover','plugin'=>'painel'));
?>

<fieldset class="box">
    <legend>Imagens</legend>
    <div class="multiupload button"><div id="button-<?PHP echo  $galleriesc ?>">Enviar arquivos</div></div>
    <ul id="multi-<?PHP echo $galleriesc?>" class="multiupload ul"></ul>
</fieldset>

<script type="text/javascript">
    var base='<?PHP echo  $this->base ?>';
    //var pid='<?PHP echo  $galleriesc ?>';
    var ul=$("#multi-<?PHP echo $galleriesc?>");
    var hasImages=false;
    var li={};
    var counter=0;

    jQuery(function($){
        new qq.FileUploaderBasic({
            button:document.getElementById('button-<?PHP echo  $galleriesc ?>'),
            action:'<?PHP echo  $this->Html->url(array('controller' => 'uploads', 'action' => 'admin_add', 'plugin' => 'painel')) ?>',
            onSubmit:function(id,filename){
                li[id]=$('<li><span></span></li>')
                ul.append(li[id]);
            },
            onProgress:function(id,filename,loaded,total){
                li[id].find('span').css('height',loaded/total*100+'%');
            },
            onComplete:function(id,filename,response){
                console.log(response);
                li[id].attr('data-id',response.id);
                li[id].html('');
                
                //Image link
                var link=$("<a />").attr('href',base+'/img/galleries/'+response.filename).attr('class','fancybox').attr('data-fancybox-group','<?PHP echo $galleriesc?>');
                var img=$('<img />').attr('src',base+'/painel/image/crop/150x150/img/galleries/'+response.filename);
                var input=$('<input />').attr('type','hidden').attr('name','data[Image]['+counter+'][id]').attr('value',response.id);
                link.append(img);                
                li[id].append(link);
                li[id].append(input);
                var del=$('<a>Excluir</a>').attr('href','<?PHP echo $delete?>/'+response.id).attr('class','delete-button');
                var title=$('<a>Título</a>').attr('href','<?PHP echo $legend?>/'+response.id).attr('class','legend-button');
                var cover=$("<a>Usar como capa</a>").attr('href','<?PHP echo $cover?>/'+response.id).attr('class','cover-button');
                li[id].append(del);
                li[id].append(title);
                li[id].append(cover);
                counter++;
            }
        });
        
        $('.multiupload').sortable({
            placeholder:'multiupload-placeholder',
            stop:function(){
                var data={};
                $("#multi-<?PHP echo $galleriesc?>>li").each(function(){
                    var id=$(this).attr('data-id');
                    var index=$(this).index();
                    data[id]={order:index,id:id}
                });
                $.getJSON('<?PHP echo $this->Html->url(array('controller'=>'uploads','action'=>'admin_order','plugin'=>'painel'))?>',data,function(data){
                });
            }
        });
        
        $(".multiupload .delete-button").live('click',function(){
            var $this=$(this);
            var href=$this.attr('href');
            $.getJSON(href,function(result){
                if(result.success){
                    $this.parent().detach();
                }
            });
            return false;
        });
        
        $('.multiupload .cover-button').live('click', function(){
            var $this=$(this);
            var href=$this.attr('href');
            $('.cover-button').each(function(){
                if($(this).hasClass('covered')){
                    href+='/'+$(this).parent().attr('data-id');
                    $(this).removeClass('covered').text('Usar como Capa');
                }
            });            
            $.getJSON(href,function(result){
                if(result.success){
                    $this.text('Capa')
                    $this.addClass('covered');
                }
            });
            return false;
        });
        
        $("a.fancybox").fancybox();
        <?PHP if(!empty($data['id'])): ?>
        $.ajax({
            url:'<?PHP echo $this->Html->url(array('plugin'=>'painel','controller'=>'uploads','action'=>'admin_list',$data['id']))?>',
            success:function(data){
                $('#multi-<?PHP echo $galleriesc?>').html(data);
            }
        });
        <?PHP endif; ?>
    })
</script>