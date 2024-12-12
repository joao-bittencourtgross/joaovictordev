<?PHP 
    echo $this->Form->create('Informacao',array('url'=>array('plugin'=>'clique_whats','controller'=>'informacao','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Dados</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('numero_whats',array('label'=>'Número do WhatsApp','class'=>'form-control','maxlength'=>15,'onkeyup'=>'mascara(this,mtel);')); 
                            echo '</div>';
                        
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto_whats',array('label'=>'Mensagem do WhatsApp','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('facebook',array('label'=>'Link do Facebook','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('instagram',array('label'=>'Link do Instagram','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('youtube',array('label'=>'Link do Youtube','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('twitter',array('label'=>'Link do Twitter','class'=>'form-control'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('linkedin',array('label'=>'Link do Linkedin','class'=>'form-control'));
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('tiktok',array('label'=>'Link do TikTok','class'=>'form-control'));
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('github',array('label'=>'Link do GitHub','class'=>'form-control'));
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>

<script>
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