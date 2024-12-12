<div class="container-fix">
    <h1 class="htl">Veja a disponíbilidade e valores dos lotes</h1>
    <div class="row row-status">
         <?PHP
            foreach ($categorias as $categoria) {
//                pre($categoria);
                $style = 'style="background-color: '.$categoria['CategoriaLote']['cor'].'"';
                echo '<div class="boxcs">';
                    echo '<div class="dcolor" '.$style.'>&nbsp;</div>';
                    echo '<h2>'.$categoria['CategoriaLote']['title'].'</h2>';
                echo '</div>';
            }
         ?>
    </div>
    <p class="pcq">*Clique sobre o lote para <br> ver mais informações</p>
</div>


<div class="mapa-lotes">
    <img src="<?PHP echo $this->Html->url('/img/mapa/mapa-lotes.jpg',true); ?>" usemap="#map_lotes" id="mapal" border="0">
</div>

<map id="map_lotes" name="map_lotes">
    <?PHP
        foreach ($lotes as $lote) {
//            pre($lote);
            echo '<area name="'.$lote['Lote']['slug'].'" class="open-vl" href="'.$this->Html->url('/detalhe-lote/'.$lote['Lote']['slug'],true).'" title="'.$lote['Lote']['title'].'" coords="'.$lote['Lote']['cordenadas'].'" shape="poly">';
        }
    ?>
<!--    <area name="lote3" href="#" coords="176,844,210,830,222,845,203,877" shape="poly">
    
    <area name="lote4" href="#" coords="223,846,242,849,238,883,205,879" shape="poly">
    
    <area name="lote5" href="#" coords="244,846,262,843,266,876,239,883" shape="poly">
    
    <area name="lote6" href="#" coords="176,804,213,810,211,828,175,841" shape="poly">

    <area name="lote7" href="#" coords="418,690,436,689,440,723,423,726" shape="poly">-->
</map>

<script>
$(document).ready(function () {
    
    $('#mapal').mapster({
        fillColor: 'ff0000',
        fillOpacity: 0.7,
        mapKey: 'name',
//        listKey: 'name',
        areas: <?= $areas ?>
    });
});
</script>


<!--<script>
$(document).ready(function () {
    
    $('#mapal').mapster({
        fillColor: 'ff0000',
        fillOpacity: 0.3,
        mapKey: 'name',
//        listKey: 'name',
        areas: [
            {
                key: "lote3",
                isDeselectable: false,
                selected: true,
                fillColor: "000000"
            },
            {
                key: "lote4",
                isDeselectable: false,
                selected: true,
                fillColor: "000000"
            },
            {
                key: "lote5",
                isDeselectable: false,
                selected: true,
                fillColor: "000000"
            },
            {
                key: "lote6",
                isDeselectable: false,
                selected: true,
                fillColor: "000000"
            },
            {
                key: "lote7",
                isDeselectable: false,
                selected: true,
                fillColor: "FE43EB"
            },
        ]
    });
});
</script>-->