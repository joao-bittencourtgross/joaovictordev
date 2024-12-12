<div class="app-page-title">
    <div class="row">
        <div class="col-md-6 col-left-top">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    Projetos
                </div>
            </div>
        </div>
        <div class="col-md-6 col-right-top">
            <?PHP echo $this->Html->link('Nova',array('action'=>'add'),array('escape'=>false,'class'=>'mb-2 mr-2 btn btn-primary btn-sm')); ?>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="mb-0 table">
                <thead>
                    <tr>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('imagem','Imagem')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('title','Título')?></th>
                        <th class="th-110">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                    </tr>
                </thead>

                <tbody class="sortable">
                    <?PHP 
                        foreach($posts as $post){ 
                    ?>
                        <tr data-id="<?php echo $post['Produto']['id'] ?>">
                            <td><?PHP if($post['Produto']['imagem']) echo $this->Fill->image($post['Produto']['imagem'],90,60,'ffffff'); ?></td>
                            <td><?PHP echo $post['Produto']['titulo']?></td>
                            <td><?PHP echo $this->Locker->link('Editar',array('action'=>'admin_edit',$post['Produto']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Excluir',array('action'=>'admin_delete',$post['Produto']['id']),array('class'=>'btn-remove'),'Tem certeza?')?></td>
                        </tr>
                    <?PHP 
                        } 
                    ?>
                </tbody>
            </table>

            <?PHP echo $this->element('Painel.paginator'); ?>
        </div>
    </div>
</div>

<script>
    var base='<?= $this->base ?>';
    jQuery(function($){
        $(".sortable").sortable({
            stop:function(evt,ui){
                $(".sortable>tr").each(function(i,e){
                    var id=$(e).attr('data-id');
                    var index=$(e).index();
                    $.getJSON(base+'/admin/produtos/produtos/order/'+id+'/'+index,function(data){
                    });
                });
            }
        });
    });
</script>







