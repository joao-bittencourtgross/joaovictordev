<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?PHP echo $title_for_layout?></title>
        <?PHP
            echo $this->Html->charset('utf-8');
            echo $this->Html->meta('canonical',$canonical,array('rel'=>'canonical','type'=>null,'title'=>null));
            echo $this->Html->meta(Router::url('/',true).'favicon.png', Router::url('/',true).'img/favicon.png', array('type'=>'icon'));

            echo $this->Less->css('indisponivel'); 
        ?>
    </head>
    <body>
        <div class="container-fix">
            <div class="row row-indisponivel">
                <?PHP echo $this->Html->image('logo.png'); ?>
                <h1>Página indisponível no momento.</h1>
            </div>
        </div>
        <script src="<?PHP echo $this->Html->url('/js/less.js',true); ?>"></script>
    </body>
</html>