<!--<link rel="stylesheet" href="<?PHP echo $this->base ?>/datepicker/jquery-ui-1.9.0.css">-->
<!--<script src="<?PHP echo $this->Html->url('/datepicker/jquery-1.8.2.js',true); ?>"></script>
<script src="<?PHP echo $this->Html->url('/datepicker/jquery-ui-1.9.0.js',true); ?>"></script>-->

<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!--<link rel="stylesheet" href="<?PHP echo $this->base ?>/pnl/jquery-ui/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/jquery-ui.js"></script>-->


<script src="<?PHP echo $this->Html->url('/pnl/Chart.bundle.min.js',true); ?>"></script>

<?PHP 
    
?>

<div class="app-page-title">
    <div class="row">
        <div class="col-md-5">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    Métricas / Acessos
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="fr-ml form-search-dates">
                <?PHP echo $this->Form->create('Data',array('class'=>'form-inline','type'=>'get','url'=>array('plugin'=>'acesso_site','controller'=>'acesso_site','action'=>'view'))); ?>
                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                        <label for="exampleEmail22" class="mr-sm-2">Período</label>
                        <?PHP echo $this->Form->input('dbegin',array('label'=>false,'div'=>false,'id'=>'b_date','value'=>$show_di)); ?>
                    </div>

                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                        <label for="exampleEmail22" class="mr-sm-2">a</label>
                        <?PHP echo $this->Form->input('dend',array('label'=>false,'div'=>false,'id'=>'e_date','value'=>$show_df)); ?>
                    </div>

                    <div class="ls-actions-btn">
                        <?PHP echo $this->Form->submit('Filtrar',array('div'=>false,'class'=>'btn btn-primary')); ?>
                    </div>
                <?PHP echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Páginas mais vistas</h5>
                
                <div class="row row-chart-pv">
                    <canvas id="paginas-vistas" width="100%"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Cliques / redirecionamentos</h5>

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left"><div class="widget-heading text-success">WhatsApp</div></div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-success"><?PHP echo $count_cr_whats; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-outer"><div class="widget-content-wrapper">
                        <div class="widget-content-left"><div class="widget-heading text-primary">Facebook</div></div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-primary"><?PHP echo $count_cr_facebook; ?></div>
                        </div>
                    </div></div></div></li>
                    
                    <li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-outer"><div class="widget-content-wrapper">
                        <div class="widget-content-left"><div class="widget-heading text-warning">Instagram</div></div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><?PHP echo $count_cr_instagram; ?></div>
                        </div>
                    </div></div></div></li>
                    
                    <li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-outer"><div class="widget-content-wrapper">
                        <div class="widget-content-left"><div class="widget-heading text-danger">Youtube</div></div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><?PHP echo $count_cr_youtube; ?></div>
                        </div>
                    </div></div></div></li>
                    
                    <li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-outer"><div class="widget-content-wrapper">
                        <div class="widget-content-left"><div class="widget-heading text-info">Twitter</div></div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><?PHP echo $count_cr_twitter; ?></div>
                        </div>
                    </div></div></div></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Acesso bruto mensal</h5>
                
                <div class="row row-chart-pv">
                    <canvas id="acesso-mensal" width="100%"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Plataforma</h5>

                <div class="row row-chart-pv">
                    <canvas id="acesso-plataforma" width="100%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="row">
    <div class="col-md-8">
        <div class="main-card card">
            <div class="card-body">
                <h5 class="card-title">Últimos Contatos</h5>

                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                            <tr>
                                <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('nome','Nome')?></th>
                                <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('email','E-mail')?></th>
                                <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('created','Data')?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP 
                                foreach($contatos as $post){ 
                            ?>
                                <tr>
                                    <td><?PHP echo $post['Contato']['nome']?></td>
                                    <td><?PHP echo $post['Contato']['email']?></td>
                                    <td><?PHP echo $post['Contato']['cdate']?></td>
                                </tr>
                            <?PHP 
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row-link-right">
                    <?PHP echo $this->Html->link('Ver todos',array('plugin'=>'contatos','controller'=>'contatos','action'=>'index'),array('escape'=>false,'class'=>'btn btn-primary btn-sm')); ?>
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
    
    var colors = ['#74C476', '#6BAED6', '#238B45', '#2171B5', '#756BB1', '#DD3497', '#EF8A62', '#D6604D', '#CA0020', '#FF6060', '#8C96C6', '#D7301F', '#FEC44F']; 
    
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
                    colors[0],
                    colors[1],
                    colors[2],
                    colors[3],
                    colors[4],
                    colors[5],
                    colors[6],
                    colors[7],
                    colors[8],
                    colors[9],
                    colors[10],
                    colors[11],
                    colors[12]
                ],
//                borderColor: [
//                    'rgba(75, 192, 192, 1)',
//                    'rgba(54, 162, 235, 1)',
//                    'rgba(255, 206, 86, 1)',
//                    'rgba(153, 102, 255, 1)',
//                    'rgba(255, 159, 64, 1)',
//                    'rgba(255, 99, 132, 1)'
//                ],
//                borderWidth: 1
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
    
    var ctx = document.getElementById('acesso-mensal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $chart_month_label; ?>,
            datasets: [{
                label: 'Acessos',
                data: <?= $chart_month_data; ?>,
                backgroundColor: [
                    colors[0],
                    colors[1],
                    colors[2],
                    colors[3],
                    colors[4],
                    colors[5],
                    colors[6],
                    colors[7],
                    colors[8],
                    colors[9],
                    colors[10],
                    colors[11],
                    colors[12]
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
    var ctx = document.getElementById('acesso-plataforma').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $chart_plataforma_label; ?>,
            datasets: [{
                label: 'Acessos Plataoforma',
                data: <?= $chart_plataforma_data; ?>,
                backgroundColor: [
                    colors[0],
                    colors[1]
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
