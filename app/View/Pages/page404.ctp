<div class="container">
    <div class="row page-404">
        <h1>404: Página não encontrada.</h1>
        <p>Parece que a página que você procurou foi retirada ou nunca existiu.</p>
        <?PHP echo $this->Html->link('Ir para a página inicial',array('plugin'=>false,'controller'=>'pages','action'=>'home'),array('escape'=>false));  ?>
    </div>
</div>