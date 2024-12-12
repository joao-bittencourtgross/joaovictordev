<fieldset class="box">
    <legend><?=$title?></legend>
    <table class="tables">
        <thead>
            <tr>
                <td><?=$this->Paginator->sort('name','Nome');?></td>
                <td><?=$this->Paginator->sort('email')?></td>
                <td><?=$this->Paginator->sort('username')?></td>
                <td><?=$this->Paginator->sort('group','Grupo')?></td>
                <td class="edit" style="width:80px;">Ativado</td>
                <td class="edit"></td>
                <td class="edit"></td>
            </tr>
        </thead>
        <tbody>
            <?PHP
            foreach($users as $user):
            ?>
            <tr class="user blocked-red">
                <td><?=$user['User']['name']?></td>
                <td><?=$user['User']['email']?></td>
                <td><?=$user['User']['username']?></td>
                <td><?=$user['User']['group']?></td>
                <td><?=$this->Html->link('Liberar',array('action'=>'inactive',$user['User']['id']))?></td>
                <td><?=$this->Html->link('Editar',array('action'=>'edit',$user['User']['id']))?></td>
                <td><?=$this->Html->link('Excluir',array('action'=>'delete',$user['User']['id']),false,'Tem certeza que deseja excluir este usuário?')?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
    </table>
    <?PHP echo $this->element('Painel.paginator'); ?>
</fieldset>