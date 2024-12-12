<div class="app-page-title">
    <div class="row">
        <div class="col-md-6 col-left-top">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    Usuários
                </div>
            </div>
        </div>
        <div class="col-md-6 col-right-top">
            <?PHP echo $this->Html->link('Novo',array('action'=>'add'),array('escape'=>false,'class'=>'mb-2 mr-2 btn btn-primary btn-sm')); ?>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="mb-0 table">
                <thead>
                    <tr>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('User.name','Nome')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('User.email','E-mail')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('User.username','Login')?></th>
                        <th class="th-110">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?PHP 
                        foreach($users as $user){ 
                            if($user['User']['group'] !== 'admx'){
                    ?>
                        <tr>
                            <td><?PHP echo $user['User']['name']?></td>
                            <td><?PHP echo $user['User']['email']?></td>
                            <td><?PHP echo $user['User']['username']?></td>
                            <td><?PHP echo $this->Locker->link('Alterar Senha',array('action'=>'admin_changepass',$user['User']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Editar',array('action'=>'admin_edit',$user['User']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Excluir',array('action'=>'admin_delete',$user['User']['id']),array('class'=>'btn-remove'),'Tem certeza?')?></td>
                        </tr>
                    <?PHP 
                            } 
                        } 
                    ?>
                </tbody>
            </table>

            <?PHP echo $this->element('Painel.paginator'); ?>
        </div>
    </div>
</div>







