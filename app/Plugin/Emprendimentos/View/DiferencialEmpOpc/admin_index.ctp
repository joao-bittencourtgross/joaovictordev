<?PHP
    $id_campo = $campo['DiferencialEmp']['id'];
?>

<div class="app-page-title">
    <div class="row">
        <div class="col-md-6 col-left-top">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    Diferenciais
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3 col-right-top">
            <?PHP echo $this->Html->link('Novo',array('plugin'=>'emprendimentos', 'controller'=>'diferencial_emp_opc', 'action'=>'add',$id_campo),array('escape'=>false,'class'=>'mb-2 mr-2 btn btn-primary btn-sm')); ?>
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
                        <th class="th-110">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                        <th class="th-er">&nbsp;</th>
                    </tr>
                </thead>

                <tbody class="sortable">
                    <?PHP 
                        foreach($posts as $post){ 
                    ?>
                        <tr data-id="<?PHP echo $post['DiferencialEmpOpc']['id']; ?>">
                            <td><?PHP echo $post['DiferencialEmpOpc']['title']?></td>
                            <td><?PHP echo $this->Locker->link('Editar',array('action'=>'admin_edit',$post['DiferencialEmpOpc']['id']),array('class'=>'btn-edit'))?></td>
                            <td><?PHP echo $this->Locker->link('Excluir',array('action'=>'admin_delete',$post['DiferencialEmpOpc']['id'],$id_campo),array('class'=>'btn-remove'),'Tem certeza?')?></td>
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
    jQuery(function($){
        $(".sortable").sortable({
            stop:function(evt,ui){
                $(".sortable>tr").each(function(i,e){
                    var id=$(e).attr('data-id');
                    var index=$(e).index();
                    $.getJSON(base+'/admin/emprendimentos/diferencial_emp/order/'+id+'/'+index,function(data){
                    });
                });
            }
        });
    });
    
    $('#select_emps').change(function(){
        window.location.href = base+'/admin/emprendimentos/diferencial_emp/index/'+this.value;;
    });
</script>