<div class="app-page-title">
    <div class="row">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                Cliques e Redirecionamentos de WhatsApp (<?PHP echo $total; ?> Registros)
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
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('ip','IP')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('plataforma','Plataforma')?></th>
                        <th class="ls-data-descending"><?PHP echo $this->Paginator->sort('ip','Data e hora')?></th>
                    </tr>
                </thead>

                <tbody>
                    <?PHP 
                        foreach($posts as $post){ 
                    ?>
                        <tr>
                            <td><?PHP echo $post['CliqueWhats']['ip']?></td>
                            <td><?PHP echo $post['CliqueWhats']['plataforma']?></td>
                            <td><?PHP echo $post['CliqueWhats']['cdate']?></td>
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

