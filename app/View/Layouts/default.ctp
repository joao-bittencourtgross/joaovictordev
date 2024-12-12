<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?PHP echo $title_for_layout?></title>
        <?PHP
            echo $this->Html->charset('utf-8');
            echo $this->Html->meta('canonical',$canonical,array('rel'=>'canonical','type'=>null,'title'=>null));
            echo $this->Html->meta(Router::url('/',true).'favicon.png', Router::url('/',true).'img/favicon.png', array('type'=>'icon'));
        ?>
        <!--<meta property="fb:app_id" content="000000" />--> 
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="wbsembalagens">
        <meta property="og:url" content="<?PHP echo $this->Html->url(false,true); ?>" />  
        <?PHP if(isset($og_title)){ ?> 
            <meta property="og:title" content="<?PHP echo $og_title; ?>" /> 
        <?PHP }else{ ?>   
            <meta property="og:title" content="WBS Embalagens" /> 
        <?PHP } ?>   
        <?PHP if(isset($og_description)){ ?> 
            <meta property="og:description" content="<?PHP echo $og_description; ?>" /> 
        <?PHP }else{ ?>  
            <meta property="og:description" content="" /> 
        <?PHP } ?>   
        <?PHP if(isset($og_image)){ ?> 
            <meta property="og:image" content="<?PHP echo $this->Html->url('/'.$og_image,true); ?>" /> 
            <meta property="og:image:width" content="200" />
            <meta property="og:image:height" content="200" />
        <?PHP }else{ ?>   
            <meta property="og:image" content="<?PHP echo $this->Html->url('/img/share.png',true); ?>" /> 
            <meta property="og:image:width" content="200" />
            <meta property="og:image:height" content="200" />
        <?PHP } ?>   
        <meta property="og:type" content="website" />
    
        <?PHP 
            echo $this->Less->css('styles-v1'); 
        ?>
        <link rel="stylesheet" href="<?PHP echo $this->base ?>/slick/slick.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script>
            var base = '<?= $this->base ?>';
        </script>
    </head>
    <body>
        <?PHP 
            echo $this->element('header');
            echo $this->fetch('content'); 
            echo $this->element('footer');
            
            echo $this->Less->css('smf'); 
            echo $this->Html->css('https://use.fontawesome.com/releases/v5.15.4/css/all.css'); 
        ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <script src="<?PHP echo $this->Html->url('/js/less.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/jslm.js',true); ?>"></script>
        <script src="<?PHP echo $this->Html->url('/js/app-v1.js',true); ?>"></script>
        
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <?PHP
          //  echo '<div class="box-suporte">';
            //    echo $this->Html->link('<i class="fab fa-whatsapp"></i>Fale Conosco', array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'index'), array('escape'=>false, 'target'=>'_blank'));
           // echo '</div>';
        ?>

        <script>
            AOS.init();
        </script>
    </body>
</html>