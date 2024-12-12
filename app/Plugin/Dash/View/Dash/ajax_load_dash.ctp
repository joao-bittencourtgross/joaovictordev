<div class="row row-mt box-dash box-dash2">
    <div class="title"><i class="fas fa-eye"></i> Quantidade de acessos / cliques <?PHP if(isset($show_date_begin)) { echo '<span class="sp-low">'.$show_date_begin.' - '.$show_date_end.'</span>'; } ?></div>
    
    <div class="ls-box ls-board-box">
        <div id="sending-stats" class="row">
            <div class="col-sm-6 col-md-3">
                <div class="ls-box ls-count-a">
                    <div class="ls-box-head">
                        <h6 class="ls-title-5 color-default">Produtos</h6>
                    </div>
                    <div class="ls-box-body">
                        <span class="ls-board-data">
                            <strong class="ls-color-theme"><?PHP echo $produtos; ?></strong>
                            <!--<small>989.257</small>-->
                            <a href="<?PHP echo $this->base; ?>/admin/acessos/acessos/index">ver detalhes</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="ls-box ls-count-a">
                    <div class="ls-box-head">
                        <h6 class="ls-title-5 color-default">Lojas</h6>
                    </div>
                    <div class="ls-box-body">
                        <span class="ls-board-data">
                            <strong class="ls-color-theme"><?PHP echo $lojas; ?></strong>
                            <a href="<?PHP echo $this->base; ?>/admin/acessos/acesso_lojas/index">ver detalhes</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="ls-box ls-count-a">
                    <div class="ls-box-head">
                        <h6 class="ls-title-5 color-default">WhatsApp</h6>
                    </div>
                    <div class="ls-box-body">
                        <span class="ls-board-data">
                            <strong class="ls-color-theme"><?PHP echo $whatsapp; ?></strong>
                            <a href="<?PHP echo $this->base; ?>/admin/acessos/acesso_whats/index">ver detalhes</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="ls-box ls-count-a">
                    <div class="ls-box-head">
                        <h6 class="ls-title-5 color-default">Telefones</h6>
                    </div>
                    <div class="ls-box-body">
                        <span class="ls-board-data">
                            <strong class="ls-color-theme"><?PHP echo $telefones; ?></strong>
                            <a href="<?PHP echo $this->base; ?>/admin/telefones/telefonewhats/index">ver detalhes</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-mt box-dash box-dash2">
    <div class="title"><i class="fas fa-envelope"></i> Contatos <?PHP if(isset($show_date_begin)) { echo '<span class="sp-low">'.$show_date_begin.' - '.$show_date_end.'</span>'; } ?></div>
    
    <div class="ls-box ls-board-box">
        <?PHP if(isset($show_date_begin)){ ?>
            <header class="ls-info-header">
                <h2 class="ls-title-5 ls-ico-week">De <?PHP echo $show_date_begin.' a '.$show_date_end; ?></h2>
            </header>
        <?PHP } ?>
        <div id="sending-stats" class="row">
            <div class="col-md-6">
                <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Últimos contatos <span>(total de <b><?PHP echo $total_contatos; ?></b> registros)</span> </h2>
                        <a href="<?PHP echo $this->base; ?>/admin/forms/forms/index" class="ls-btn ls-btn-sm">Ver todos</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($contatos as $contato) {
                                    echo '<tr>';
                                        echo '<td>'.$contato['Form']['nome'].'</td>';
                                        echo '<td>'.$contato['Form']['email'].'</td>';
                                        echo '<td>'.$contato['Form']['cdate'].'</td>';
                                        echo '<td>'.$this->Html->link('Ver',array('plugin'=>'forms','controller'=>'forms','action'=>'view','admin'=>true,$contato['Form']['id']),array()).'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Mensagens ao lojista <span>(total de <b><?PHP echo $total_contatos_lojistas; ?></b> registros)</span></h2>
                        <a href="<?PHP echo $this->base; ?>/admin/forms/form_loja/index" class="ls-btn ls-btn-sm">Ver todas</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($contatos_lojistas as $contato_lojista) {
                                    echo '<tr>';
                                        echo '<td>'.$contato_lojista['FormLoja']['nome'].'</td>';
                                        echo '<td>'.$contato_lojista['FormLoja']['email'].'</td>';
                                        echo '<td>'.$contato_lojista['FormLoja']['cdate'].'</td>';
                                        echo '<td>'.$this->Html->link('Ver',array('plugin'=>'forms','controller'=>'form_loja','action'=>'view','admin'=>true,$contato_lojista['FormLoja']['id']),array()).'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="sending-stats" class="row row-ca">
            <div class="col-md-6">
                <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Newsletter <span>(total de <b><?PHP echo $total_newsletters; ?></b> registros)</span></h2>
                        <a href="<?PHP echo $this->base; ?>/admin/newsletters/newsletters/index" class="ls-btn ls-btn-sm">Ver todas</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($newsletters as $newsletter) {
                                    echo '<tr>';
                                        echo '<td>'.$newsletter['Newsletter']['nome'].'</td>';
                                        echo '<td>'.$newsletter['Newsletter']['email'].'</td>';
                                        echo '<td>'.$newsletter['Newsletter']['cdate'].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Indicação <span>(total de <b><?PHP echo $total_indicacoes; ?></b> registros)</span></h2>
                        <a href="<?PHP echo $this->base; ?>/admin/newsletters/indicacao/index" class="ls-btn ls-btn-sm">Ver todas</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <!--<th>E-mail</th>-->
                            <th>Indicação</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($indicacoes as $indicacao) {
                                    echo '<tr>';
                                        echo '<td>'.$indicacao['Indicacao']['nome'].'</td>';
    //                                        echo '<td>'.$indicacao['Indicacao']['email'].'</td>';
                                        echo '<td>'.$indicacao['Indicacao']['produto'].'</td>';
                                        echo '<td>'.$indicacao['Indicacao']['cdate'].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="sending-stats" class="row row-ca">
            <div class="col-md-6">
                <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Login Cadastrados <span>(total de <b><?PHP echo $total_clientes; ?></b> registros)</span></h2>
                        <a href="<?PHP echo $this->base; ?>/admin/clientes/clientes/index" class="ls-btn ls-btn-sm">Ver todas</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($clientes as $cliente) {
                                    echo '<tr>';
                                        echo '<td>'.$cliente['Cliente']['title'].'</td>';
                                        echo '<td>'.$cliente['Cliente']['email'].'</td>';
                                        echo '<td>'.$cliente['Cliente']['cdate'].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
    <!--            <div class="ls-box ls-box-mh">
                    <header class="ls-info-header ls-ih2">
                        <h2 class="ls-title-5">Inscrições de Evento <span>(total de <b><?PHP echo $total_inscricoes_eventos; ?></b> registros)</span></h2>
                        <a href="<?PHP echo $this->base; ?>/admin/forms/form_evento/index" class="ls-btn ls-btn-sm">Ver todas</a>
                    </header>

                    <table class="ls-table ls-table2">
                        <thead>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <?PHP
                                foreach ($inscricoes_eventos as $inscricao_evento) {
                                    echo '<tr>';
                                        echo '<td>'.$inscricao_evento['FormEvento']['nome'].'</td>';
                                        echo '<td>'.$inscricao_evento['FormEvento']['email'].'</td>';
                                        echo '<td>'.$inscricao_evento['FormEvento']['cdate'].'</td>';
                                        echo '<td>'.$this->Html->link('Ver',array('plugin'=>'forms','controller'=>'form_evento','action'=>'view','admin'=>true,$inscricao_evento['FormEvento']['id']),array()).'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>-->
            </div>
        </div>
    </div>
</div>