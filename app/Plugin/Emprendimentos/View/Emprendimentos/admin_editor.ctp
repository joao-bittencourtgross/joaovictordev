<link rel="stylesheet" href="<?PHP echo $this->base ?>/selectize/selectize.css">
<script src="<?PHP echo $this->base ?>/selectize/selectize.js"></script>

<?PHP 
    echo $this->Form->create('Emprendimento',array('type'=>'file','url'=>array('action'=>'add')));
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Empreendimento</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            $ativo = array('1'=>'Sim', '0'=>'Não');
//                            $tipo = array('Edifício'=>'Edifício', 'Residencial'=>'Residencial');
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('ativo',array('label'=>'Ativo','required'=>'required','options'=>$ativo,'class'=>'custom-select'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('cidade_id',array('label'=>'Cidade','options'=>$cidades,'class'=>'custom-select'));
                            echo '</div>';
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('tipo',array('label'=>'Tipo','options'=>$tipo,'class'=>'custom-select'));
//                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('area_total',array('label'=>'Área total','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('qtd_lotes',array('label'=>'Qtd. de lotes','class'=>'form-control')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('area_lotes',array('label'=>'Área dos lotes','class'=>'form-control')); 
                            echo '</div>';
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('cidadea',array('label'=>'Cidadea','class'=>'form-control')); 
//                            echo '</div>';
                            
                          //  echo '<div class="position-relative form-group">';
                            //    echo $this->Form->input('status',array('label'=>'Status','class'=>'form-control')); 
                          //  echo '</div>';
                            
                          //  echo '<div class="position-relative form-group">';
                             //   echo $this->Form->input('resumo_home',array('label'=>'Breve Descrição Página Inicial','class'=>'ckeditor'));
                          //  echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto',array('label'=>'Texto <span>(Página interna)</span>','class'=>'form-control','class'=>'ckeditor')); 
                            echo '</div>';

                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto_hover',array('label'=>'Texto hover HOME (Resumo em poucas palavras)','class'=>'form-control')); 
                            echo '</div>';
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('titulo_catalogo',array('label'=>'Título Formulário (<span>Folder/Catalogo</span>)','class'=>'form-control')); 
//                            echo '</div>';
                            
                         //   echo '<div class="position-relative form-group">';
                              //  echo $this->Form->input('texto_localizacao',array('label'=>'Texto Localização','class'=>'form-control','class'=>'ckeditor')); 
                          //  echo '</div>';
                            
                          //  echo '<div class="position-relative form-group">';
                             //   echo $this->Form->input('iframe_gm',array('label'=>'Iframe Google Maps <span>(Retirar: width="600" height="450" frameborder="0")</span>','class'=>'form-control')); 
                         //   echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        
         
     <!--   <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Tamanho Lotes</h5>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <?PHP 
                          //  echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('lote_de',array('label'=>'Lotes de: &nbsp;')); 
                          //  echo '</div>';
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?PHP 
                         //   echo '<div class="position-relative form-group">';
                         //       echo $this->Form->input('lote_ate',array('label'=>'Lotes até: &nbsp;')); 
                         //   echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div> -->
         
      <!--  <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">SEO</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                           // echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('seo_palavras',array('label'=>'Keywords <span>(Digite a palavra e aparte enter)</span>','id'=>'seo_palavras')); 
                         //   echo '</div>';
                     
                          //  echo '<div class="position-relative form-group">';
                          //      echo $this->Form->input('seo_descricao',array('label'=>'Descrição','class'=>'form-control')); 
                         //   echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div> -->
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Diferenciais</h5>
                
                <div class="form-row box-cheks">
                    <div>
                        <?PHP 
//                            echo $this->Form->input('Diferencial',array('multiple'=>'checkbox','label'=>false,'options'=>$diferenciais));
                        ?>
                    </div>
                </div>
            </div>
        </div>-->
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Catalogo Digital</h5>
                
                <div class="form-row">
                    <?PHP
//                        if(isset($this->data['Emprendimento']['catalogo_digital']) && $this->data['Emprendimento']['catalogo_digital']){
//                            echo '<div class="row file-digital">';
//                                echo '<a href="'.$this->Html->url('/'.$this->data['Emprendimento']['catalogo_digital'],true).'" target="_blank">Ver Arquivo</a>';
//                                echo $this->Locker->link('Remover',array('plugin'=>'emprendimentos','controller'=>'emprendimentos','action'=>'admin_remove_catalogo',$this->data['Emprendimento']['id']),array('class'=>'remove'),'Deseja remover o arquivo?');
//                            echo '</div>';
//                        }else{
//                            echo '<div class="input-wrapper">';
//                                echo '<input id="input-file" type="file" name="data[Emprendimento][catalogo_digital]" value="" />';
//                                echo '<span id="file-name"></span>';
//                            echo '</div>';
//                        }
                        
                    ?>
                </div>
            </div>
        </div>-->

        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                    echo $this->element('Painel.image',array('label'=>'Imagem Miniatura <span style="font-size: 14px;">(Tamanho em pixels: 368x357)</span>','name'=>'imagem_miniatura','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                    echo $this->element('Painel.image',array('label'=>'Imagem Destaque <span style="font-size: 14px;">(Tamanho em pixels: 1920x600)</span>','name'=>'imagem','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div>

       <!-- <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                   // echo $this->element('Painel.image',array('label'=>'Logo (220x100)','name'=>'logo','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div> -->

      <!--  <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                   // echo $this->element('Painel.image',array('label'=>'Imagem detalhe/metros <span style="font-size: 14px;">(580x350)</span>','name'=>'img_detalhe','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div> -->
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
//                    echo $this->element('Painel.image',array('label'=>'Banner (Tamanho em pixels: 1920x900)','name'=>'banner','table'=>'tb_emprendimentos','reduce'=>'banner'));
                ?>
            </div>
        </div>-->

      <!--  <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                   // echo $this->element('Painel.image',array('label'=>'Imagem de compartilhamento WhatsApp (200x200)','name'=>'img_whatsapp','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div> -->
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
//                    echo $this->element('Painel.image',array('label'=>'Imagem Mapa (1080px de largura)','name'=>'img_mapa','table'=>'tb_emprendimentos'));
                ?>
            </div>
        </div>-->

        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.gallery',array('label'=>'Galeria de imagens')); ?>
            </div>
        </div>
        
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP // echo $this->element('Painel.videos',array('label'=>'Vídeo')); ?>
            </div>
        </div>-->
        
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>

<script>
$('#seo_palavras, #emails_catalogo, #emails_form2').selectize({
    persist: false,
    createOnBlur: true,
    create: true,
    plugins:['remove_button'],
    delimiter: '; '
});

//var $input = document.getElementById('input-file'),
//$fileName = document.getElementById('file-name');
//
//$input.addEventListener('change',function(){
//    $fileName.textContent = this.value;
//});
</script>