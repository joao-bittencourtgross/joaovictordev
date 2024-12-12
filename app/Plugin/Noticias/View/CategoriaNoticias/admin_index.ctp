<div class="ls-box">
  <h2 class="ls-title-5 ls-display-inline-block">Categoria de Notícias</h2>
  <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
    <?PHP echo $this->Html->link('Adicionar',array('action'=>'add'),array('escape'=>false,'class'=>'ls-btn')); ?>
  </div>
</div>

<table class="ls-table ls-no-hover ls-table-striped ls-bg-header">
    <thead>
        <tr>
            <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('title','Título')?></th>
            <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('created','Criado')?></th>
            <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('modified','Modificado')?></th>
            <th class="edit-d">&nbsp;</th>
            <th class="edit-d">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?PHP foreach($posts as $post){ ?>
            <tr>
                <td><?PHP echo $post['CategoriaNoticia']['title']?></td>
                <td><?PHP echo $post['CategoriaNoticia']['cdate']?></td>
                <td><?PHP echo $post['CategoriaNoticia']['mdate']?></td>
                <td><?PHP echo $this->Html->link('Editar',array('action'=>'edit',$post['CategoriaNoticia']['id']),array('class'=>'ls-btn ls-btn-xs'))?></td>
                <td><?PHP echo $this->Html->link('Excluir',array('action'=>'delete',$post['CategoriaNoticia']['id']),array('class'=>'ls-btn-danger ls-btn-xs'),'Tem certeza?')?></td>
            </tr>
        <?PHP } ?>
    </tbody>
</table>
<?PHP echo $this->element('Painel.paginator');?>
