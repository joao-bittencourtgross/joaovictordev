<div class="app-page-title">
    <div class="row">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                Contatos (<?PHP echo $total; ?> registros)
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="mb-0 table">
                <thead>
                    <tr>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('nome','Nome')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('email','E-mail')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('telefone','Telefone')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('created','Data')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('plataforma','Plataforma')?></th>
                        <th class="th-er">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?PHP 
                        foreach($posts as $post){ 
                    ?>
                        <tr>
                            <td><?PHP echo $post['Contato']['nome']?></td>
                            <td><?PHP echo $post['Contato']['email']?></td>
                            <td><?PHP echo $post['Contato']['telefone']?></td>
                            <td><?PHP echo $post['Contato']['cdate']?></td>
                            <td><?PHP echo $post['Contato']['plataforma']?></td>
                            <td><?PHP echo $this->Locker->link('Ver',array('action'=>'admin_view',$post['Contato']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Excluir',array('action'=>'admin_delete',$post['Contato']['id']),array('class'=>'btn-remove'),'Tem certeza?')?></td>
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







