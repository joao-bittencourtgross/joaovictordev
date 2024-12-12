<link rel="stylesheet" href="<?PHP echo $this->base ?>/datepicker/jquery-ui-1.9.0.css">
<script src="<?PHP echo $this->Html->url('/datepicker/jquery-1.8.2.js',true); ?>"></script>
<script src="<?PHP echo $this->Html->url('/datepicker/jquery-ui-1.9.0.js',true); ?>"></script>

<?PHP 
    
?>

<!--<div class="app-page-title">
    <div class="row">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                Páginas mais vistas
            </div>
        </div>
    </div>
</div>-->

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Páginas mais vistas</h5>
                
                
                <div class="form-row">
                    <?PHP echo $this->Form->create('Data',array('class'=>'form-inline','type'=>'get','url'=>array('plugin'=>'acesso_site','controller'=>'acesso_site','action'=>'view'))); ?>
                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                            <label for="exampleEmail22" class="mr-sm-2">Período</label>
                            <?PHP echo $this->Form->input('begin',array('label'=>false,'div'=>false,'autocomplete'=>'off','id'=>'b_date','value'=>$show_di)); ?>
                        </div>
                    
                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                            <label for="exampleEmail22" class="mr-sm-2">a</label>
                            <?PHP echo $this->Form->input('end',array('label'=>false,'div'=>false,'autocomplete'=>'off','id'=>'e_date','value'=>$show_df)); ?>
                        </div>
                    
                        <div class="ls-actions-btn">
                            <?PHP echo $this->Form->submit('Filtrar',array('div'=>false,'class'=>'btn btn-primary')); ?>
                        </div>
                    <?PHP echo $this->Form->end(); ?>
                </div>
                
                <div class="row row-chart-pv">
                    <canvas id="paginas-vistas" width="100%"></canvas>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#b_date').datepicker({
            dateFormat: 'dd/mm/yy',
            onClose : function( selectedDate ) {
                $('#e_date').datepicker('option', 'minDate', selectedDate );
            }
        });
    
        $('#e_date').datepicker({
            dateFormat: 'dd/mm/yy',
            onClose:function( selectedDate ) {
                $('#b_date').datepicker('option', 'maxDate', selectedDate );
            }
        });

        $.datepicker.regional['pt'] = {
            closeText: 'Fechar',
            prevText: 'Anterior',
            nextText: 'Seguinte',
            currentText: 'Hoje',
            monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'S&aacute;bado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
            weekHeader: 'Sem',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['pt']);

    });
    
   
    var ctx = document.getElementById('paginas-vistas');
    var myChart = new Chart(ctx, {
//        type: 'doughnut',
        type: 'pie',
        data: {
//            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            labels: <?= $chart_labels; ?>,
            datasets: [{
                label: '# of Votes',
//                data: [12, 19, 3, 5, 2, 3],
                data: <?= $chart_number; ?>,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            labels: {
                fontSize: 28
            },
//            title: {
//                    display: true,
//                    text: 'Chart.js Doughnut Chart'
//            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
</script>
