<div class="app-page-title">
    <div class="row">
        <div class="col-md-6 col-left-top">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    Lotes
                </div>
            </div>
        </div>
        <div class="col-md-6 col-right-top">
            <?PHP echo $this->Html->link('Adicionar Novo',array('action'=>'add'),array('escape'=>false,'class'=>'mb-2 mr-2 btn btn-primary btn-sm')); ?>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="mb-0 table">
                <thead>
                    <tr>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('title','Título')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('categoria_id','Categoria')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('ativo','Ativo')?></th>
                        <th class="th-110">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                    </tr>
                </thead>

                <tbody class="sortable">
                    <?PHP 
                        foreach($posts as $post){ 
                    ?>
                        <tr data-id="<?PHP echo $post['Lote']['id']; ?>">
                            <td><?PHP echo $post['Lote']['title']?></td>
                            <td><?PHP echo $post['CategoriaLote']['title']?></td>
                            <td><?PHP echo $this->Html->image('painel/ativo_'.$post['Lote']['ativo'].'.png',array('alt'=>'')); ?></td>
                            <td><?PHP echo $this->Locker->link('Editar',array('action'=>'admin_edit',$post['Lote']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Excluir',array('action'=>'admin_delete',$post['Lote']['id']),array('class'=>'btn-remove'),'Tem certeza?')?></td>
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