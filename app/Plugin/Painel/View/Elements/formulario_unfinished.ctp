<?PHP
$formOptions = array(
    'text'=>'Texto Simples',
    'email'=>'E-mail',
    'tel'=>'Telefone',
    'textarea'=>'Campo de Texto',
);
?>

<fieldset class="box formulario sectorized" data-sector="form" >
    <legend><?PHP echo $label?></legend>
    <nav class="buttons" id="addField">
        <a href="javascript:void(0);" class="selector"><?PHP echo __("Adicionar campo de formulário")?></a>
    </nav>
    <div class="items">
        <div class="item">
            <a class="remove" href="javascript:void(0);">x</a>
            <?PHP
            echo $this->Form->input('formType',array('label'=>false,'div'=>false,'id'=>'formType','type'=>'select','options'=>$formOptions));
            echo $this->Form->input('formTitle',array('label'=>false,'div'=>false,'id'=>'formTitle','type'=>'text','placeholder'=>'Título do campo'));
            ?>
        </div>
    </div>
</fieldset>

<script type="text/javascript">
    jQuery(function($){
        $('#addField').click(function(){
            $('.items').append(
                '<div class="item">'+
                    '<a class="remove" href="javascript:void(0);">x</a>'+
                    '<select name="data[Pagina][formType]" id="formType">'+
                        <?PHP
                        echo "'";
                        foreach($formOptions as $value=>$option):
                            echo "<option value={$value}>{$option}</option>";
                        endforeach;
                        echo "'";
                        ?>+
                    '</select>'+
                '</div>'
            );
        });
        $('a.remove').click(function(){
            $(this).parent().remove();
        });
    });
</script>