<?PHP
$get_data=$this->data;
$get_data=array_shift($get_data);
$lat=isset($get_data['latitude'])?$get_data['latitude']:'0';
$lng=isset($get_data['longitude'])?$get_data['longitude']:'0';

echo $this->Form->hidden('lat',array('value'=>$lat,'id'=>'lat'));
echo $this->Form->hidden('lng',array('value'=>$lng,'id'=>'lng'));

echo $this->html->css('/google_maps/css/findplace.css',false,array('inline'=>true));
echo $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCqHEkOru8p3_4DJ8dKpqIKG9XnhwUpENM',array('inline'=>true));

if($lat != 0 && $lng != 0){
    $optDft = 1;
} else {
    $optDft = 0;
}
?>

<div class="ls-alert-box ls-dismissable col-sm-8">
    <fieldset class="box" data-sector="locale">
        <legend>Localização no mapa (<b>Coloque o nome da rua número e cidade e clique em ok</b>)</legend>
        <div class="gmap">
            <?PHP            
            echo $this->Form->input(
                    'gmap_address',
                    array(
                        'label'=>false,
                        'div'=>false,
                        'id'=>'gmap_address',
                        'placeholder'=>'Digite o endereço para encontrar no mapa',
                    )
            );
            echo $this->Form->submit(
                    'OK',
                    array(
                        'div'=>false,
                        'id'=>'gmap_okbtn',
                        'type'=>'button',
                    )
            );
            ?>
        </div>
        <div id="map_canvas"></div>
    </fieldset>
</div>

<?PHP
echo $this->Form->hidden('latitude',array('id'=>'latitude','default'=>'0'));
echo $this->Form->hidden('longitude',array('id'=>'longitude','default'=>'0'));
?>

<script type="text/javascript">
    function getMap(){
        var base='<?=$this->base?>';
        var geocoder=new google.maps.Geocoder();
//        var centro=new google.maps.LatLng(<?PHP echo $lat?>,<?PHP echo $lng?>);
        var centro=new google.maps.LatLng(document.getElementById('lat').value,document.getElementById('lng').value);

        var map=new google.maps.Map(document.getElementById('map_canvas'),{
            center:centro,
            zoom:3,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        });

        var marker=new google.maps.Marker({
            map:map,
            position:centro,
            draggable:true,
        });

        google.maps.event.addListener(marker,'dragend',function(e){
            $('#latitude').val(e.latLng.lat());
            $('#longitude').val(e.latLng.lng());
        });

        $('#gmap_okbtn').click(function(){
            geocoder.geocode({address:document.getElementById('gmap_address').value},function(results,status){
                if(status!=google.maps.GeocoderStatus.OK){
                    alert('Endereço não encontrado');
                    return false;
                } else {
                    var result=results[0].geometry.location;
                    marker.setPosition(result);
                    map.panTo(result);
                    map.setZoom(16);

                    $('#latitude').val(result.lat());
                    $('#longitude').val(result.lng());

                }
            });
        });
    }
    
    getMap();
</script>