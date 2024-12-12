<div class="detalhe-lote">
    <div class="row">
        <span class="close-forml" title="Fechar"><?PHP echo $this->Html->image('close.svg',array('alt'=>'Fechar')); ?></span>
    </div>
    <?PHP
        if($this->Session->check('SessaoLote')){
//            echo '<div class="infos-lote">';
//                echo '<div class="six columns">';
//                    echo '<h1>Lote: '.$lote['Lote']['title'].'</h1>';
//                    echo '<h2>'.$lote['CategoriaLote']['title'].'</h2>';
//                    echo '<h3>Valor: R$ '.$lote['Lote']['valor'].'</h3>';
//                echo '</div>';
//                echo '<div class="six columns">';
//                    echo '<div class="row texto">';
//                        echo $lote['Lote']['texto'];
//                    echo '</div>';
//                echo '</div>';
//            echo '</div>';
            
            echo '<div class="infos-lote">';
                echo '<div class="if-logo">';
                    echo $this->Html->image('logo.png',array('alt'=>''));
                echo '</div>';
                
                echo '<h1>Lote: '.$lote['Lote']['title'].'</h1>';
                echo '<h2>'.$lote['CategoriaLote']['title'].'</h2>';
                echo '<h3>Valor: R$ '.$lote['Lote']['valor'].'</h3>';

                echo '<div class="row texto">';
                    echo $lote['Lote']['texto'];
                echo '</div>';
                
                
            echo '</div>';
        }else{
            echo '<p class="pff">Preencha o formulário e tenha acesso aos valores e tamanhos dos lotes</p>';
            echo '<p class="pff pff2">Lote: '.$lote['Lote']['title'].'</p>';
            echo '<div class="row row-forml">';
                
                echo $this->Form->create('ContatoLote',array('class'=>'formc','url'=>array('plugin'=>'lotes','controller'=>'lotes','action'=>'ajax_lote','slug'=>$lote['Lote']['slug'])));
                    echo $this->Form->hidden('lote_id',array('value'=>$lote['Lote']['id']));
                    echo $this->Form->hidden('lote_nome',array('value'=>$lote['Lote']['title']));

                    echo $this->Form->input('nome',array('label'=>false,'div'=>false,'placeholder'=>'Nome','data-amex-input'=>'name')); 
                    echo $this->Form->input('email',array('type'=>'email','label'=>false,'div'=>false,'placeholder'=>'E-mail','data-amex-input'=>'email'));
                    echo $this->Form->input('telefone',array('label'=>false,'div'=>false,'placeholder'=>'Telefone','maxlength'=>15,'type'=>'tel','onkeyup'=>'mascara(this,mtel);','data-amex-input'=>'phone'));
                    echo $this->Form->submit('Ver informações',array('div'=>false,'class'=>'bs-contact-lote')); 
                    echo '<div class="row msg-send-form"> Enviando dados...</div>';
                echo $this->Form->end();
            echo '</div>';
        }
    ?>
</div>

<script>
$(document).ready(function(){
    $('.close-forml').click(function(){
        window.history.pushState('', '/', window.location.pathname);
        $.magnificPopup.close(); 
    });
    
    $('.bs-contact-lote').click(function(){
        var formID = document.getElementById("ContatoLoteAjaxLoteForm");
        if(formID.checkValidity()) {
            $(this).hide();
            $('.msg-send-form').show();
        }
    });
});
    
$(window).bind('pageshow', function() {
    $('.msg-send-form').hide();
    $('.bs-contact-lote').show();
});

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
        if (tecla==8 || tecla==0) return true;
        else  return false;
    }
}

function mascara(o,f){
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()",1);
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function mtel(v){
    v=v.replace(/\D/g,"");             
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    
    return v;
}
</script>