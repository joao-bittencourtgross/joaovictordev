<header class="header-lotes">
    <?PHP
        
        echo '<div class="left-logo">';
            echo $this->Html->link($this->Html->image('logo.png',array('alt'=>'Bella Casa & Okada')),$this->Html->url('/mapa-lotes',true),array('escape'=>false));
        echo '</div>';
        echo '<div class="right-options">';
            foreach ($categorias as $categoria) {
                $style = 'style="background-color: '.$categoria['CategoriaLote']['cor'].'"';
                echo '<div class="boxcs">';
                    echo '<div class="dcolor" '.$style.'>&nbsp;</div>';
                    echo '<h2>'.$categoria['CategoriaLote']['title'].'</h2>';
                echo '</div>';
            }
        echo '</div>';
     
     ?>
</header>

<h1 class="htl">Conheça o mais novo loteamento de Cascavel <br> Paraíso Tropical!</h1>

<div class="mapa-lotes">
    <img src="<?PHP echo $this->Html->url('/img/mapa/loteamento-paraiso-tropical2.jpg',true); ?>" usemap="#map_lotes" id="mapal" border="0">
</div>

<map id="map_lotes" name="map_lotes">
    <?PHP
//        pre($lotes);
        foreach ($lotes as $lote) {
            echo '<area name="'.$lote['Lote']['slug'].'" class="open-vl" href="'.$this->Html->url('/detalhe-lote/'.$lote['Lote']['slug'],true).'" title="'.$lote['Lote']['title'].'" coords="'.$lote['Lote']['cordenadas'].'" shape="poly">';
        }
    ?>
</map>

<footer>
    <div class="row">
        <div class="four columns link-left">
            <?PHP echo $this->Html->link('Ir para o site','/',array('escape'=>false)); ?>
        </div>
        <div class="four columns logo-footer">
            <?PHP echo $this->Html->image('logo.png',array('alt'=>'Bella Casa & Okada')); ?>
        </div>
    </div>
    
    <div class="box-whatsapp">
        <?PHP 
            echo $this->Html->link('<span>Agendar visita</span> '.$this->Html->image('button_whatsapp.png',array('alt'=>'Fale conosco via WhatsApp','title'=>'Fale conosco via WhatsApp')),'https://api.whatsapp.com/send?phone=5545999889988&text=Olá, gostaria de mais informações sobre o Loteamento Paraíso Tropical',array('escape'=>false,'target'=>'_blank'));
        ?>
    </div>
</footer>

<script>
$(document).ready(function () {
    
    $('#mapal').mapster({
        fillColor: 'ff0000',
        fillOpacity: 0.4,
        mapKey: 'name',
//        listKey: 'name',
        areas: <?= $areas ?>
    });
});
</script>

<?PHP if($open_lote && isset($_GET['modal']) && $_GET['modal'] === 'open' && $this->Session->check('SessaoLote')) { ?>
    <div class="detalhe-lote" id="open_automatic">
        
        <div class="row">
            <span class="close-forml" title="Fechar"><?PHP echo $this->Html->image('close.svg',array('alt'=>'Fechar')); ?></span>
        </div>
        <?PHP
            echo '<div class="infos-lote">';
               echo '<div class="if-logo">';
                    echo $this->Html->image('logo.png',array('alt'=>''));
                echo '</div>';
                
                echo '<h1>Lote: '.$open_lote['Lote']['title'].'</h1>';
                echo '<h2>'.$open_lote['CategoriaLote']['title'].'</h2>';
                echo '<h3>Valor: R$ '.$open_lote['Lote']['valor'].'</h3>';

                echo '<div class="row texto">';
                    echo $open_lote['Lote']['texto'];
                echo '</div>';
         
            echo '</div>';
        ?>
    </div>

    <script>
        var base = '<?= $this->base ?>';
        $(document).ready(function () {
            jQuery(window).load(function(){
                jQuery.magnificPopup.open({
                    type: 'inline',
                    closeOnBgClick: true,
                    showCloseBtn: false,
                    items: {src: '#open_automatic'},
                    callbacks: {
                        open: function() {
                            
                        },
                        close: function(){
//                             window.location = document.URL.replace('?modal=open','');
                             window.location.href = base+'/mapa/loteamento-paraiso-tropical';
                        },
                        success: function() {
                            
                        }
                    }
                });

                $('.close-forml').click(function(){
//                    window.location.href = base+'/mapa-lotes';
                    window.location.href = base+'/mapa/loteamento-paraiso-tropical';
                }); 
            });        

        });
    </script>
<?PHP } ?>
