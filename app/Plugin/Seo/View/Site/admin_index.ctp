<!--<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            Configurações SEO
        </div>
    </div>
</div>-->

<?PHP 
    if(isset($message)) {
        echo $this->Html->tag('h1', $message, array('class'=>'card-title text-success ts-hs','data-delay-hide'=>2));
    }
        
    echo $this->Form->create('SeoConfig'); 
        $delete_icon = $this->Html->image('Painel.icons/delete.png');
?>


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">SEO</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <?PHP echo $this->Form->input('title',array('label'=>'Título do site','class'=>'form-control'));?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <?PHP echo $this->Form->input('description',array('label'=>'Descrição do site','class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Keywords</h5>

                <ul class="list-group" id="keywords">
                    <?PHP 
                        foreach($keywords as $keyword){
                            $link = $this->Html->link($delete_icon,array('plugin'=>'seo','controller'=>'keywords','action'=>'delete','admin'=>true,$keyword),array('escape'=>false));
                            echo $this->Html->tag('li', $keyword.$link,array('class'=>'list-group-item'));
                        }
                    ?>
                </ul>
                <br>
                <?PHP echo $this->Html->link('Adicionar keyword',array('plugin'=>'seo','controller'=>'keywords','action'=>'add','admin'=>true),array('id'=>'add-keyword','class'=>'mb-2 mr-2 btn-transition btn btn-outline-alternate')); ?>
            </div>
        </div>
    </div>
</div>
    
<?PHP
        echo '<button class="mt-2 btn btn-primary btn-mbm">Salvar</button>';
    echo $this->Form->end();
?>


<script>
$(document).ready(function(){
    
    var icons = {
        delete:'<?=$delete_icon?>',
    }
    
    $("#add-keyword").on('click',function(){
        var kw=prompt('Digite uma keyword');
        if(!kw) return false;
        var url=$(this).attr('href')+'/'+kw;
        $.getJSON(url,function(data){
            if(data.status=='ok'){
                var dlink=base+'/admin/seo/keywords/delete/'+kw;
                $("#keywords").append('<li class="list-group-item">'+kw+'<a href="'+dlink+'">'+icons.delete+'</a></li>');
            }
        });
        return false;
    });
    
    $("#keywords a").on('click',function(){
        var $this = $(this);
        $.getJSON($(this).attr('href'),function(data){
            if(data.status=='ok'){
                $this.parent().detach();
                return false;
            }
        });
        return false;
    });    
});
</script>