<!DOCTYPE html>
<html lang="pt-BR">
    <head>
<!--        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NT883VS');</script>-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?PHP echo $title_for_layout?></title>
        <?PHP
            echo $this->Html->charset('utf-8');
            echo $this->Html->meta('canonical',$canonical,array('rel'=>'canonical','type'=>null,'title'=>null));
            echo $this->Html->meta(Router::url('/',true).'favicon.png', Router::url('/',true).'img/favicon.png', array('type'=>'icon'));
        ?>
        <!--<meta property="fb:app_id" content="000000" />--> 
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="bellacasaeokada">
        <meta property="og:url" content="<?PHP echo $this->Html->url(false,true); ?>" />  
        <?PHP if(isset($og_title)){ ?> 
            <meta property="og:title" content="<?PHP echo $og_title; ?>" /> 
        <?PHP }else{ ?>   
            <meta property="og:title" content="Bella Casa & Okada" /> 
        <?PHP } ?>   
        <?PHP if(isset($og_description)){ ?> 
            <meta property="og:description" content="<?PHP echo $og_description; ?>" /> 
        <?PHP }else{ ?>  
            <meta property="og:description" content="Loteamento Paraíso Tropical" /> 
        <?PHP } ?>   
        <?PHP if(isset($og_image)){ ?> 
            <meta property="og:image" content="<?PHP echo $this->Html->url('/'.$og_image,true); ?>" /> 
            <meta property="og:image:width" content="200" />
            <meta property="og:image:height" content="200" />
        <?PHP }else{ ?>   
            <meta property="og:image" content="<?PHP echo $this->Html->url('/img/mapa/sharemap.jpg',true); ?>" /> 
            <meta property="og:image:width" content="200" />
            <meta property="og:image:height" content="200" />
        <?PHP } ?>   
        <meta property="og:type" content="website" />
    
        <?PHP 
            echo $this->Less->css('lotes'); 
        ?>
        <script>
            var base = '<?= $this->base ?>';
        </script>
        <script src="<?PHP echo $this->Html->url('/js/jquery.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/jquery.imagemapster.js',true); ?>"></script>
    </head>
    </head>
    <body>
<!--        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NT883VS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
        
        <?PHP 
            echo $this->fetch('content'); 
            
            echo $this->Less->css('smf'); 
//            echo $this->Html->css('https://use.fontawesome.com/releases/v5.0.6/css/all.css'); 
        ?>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet"> 
        
        <script src="<?PHP echo $this->Html->url('/js/less.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/magnific.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/lotes.js',true); ?>"></script>
    </body>
</html>