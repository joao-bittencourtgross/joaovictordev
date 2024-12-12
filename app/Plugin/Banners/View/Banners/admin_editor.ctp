<?PHP 
    echo $this->Form->create('Banner',array('url'=>array('action'=>'add')));
        $target = array('_self'=>'Mesma Página', '_blank'=>'Nova Página');
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Banner</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            $ativo = array('1'=>'Sim', '0'=>'Não');
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('ativo',array('label'=>'Ativo','required'=>'required','options'=>$ativo,'class'=>'custom-select'));
                            echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('link',array('label'=>'Link','class'=>'form-control')); 
                            echo '</div>';

                           // echo '<div class="position-relative form-group">';
                           //     echo $this->Form->input('texto',array('label'=>'Texto','class'=>'form-control')); 
                          //  echo '</div>';
                            
                            
//                            echo '<div class="position-relative form-group">';
//                                echo $this->Form->input('texto',array('label'=>'Texto','class'=>'ckeditor'));
//                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                    echo $this->element('Painel.image',array('label'=>'Banner (Tamanho em pixels: 1920x500)','name'=>'thumb','table'=>'tb_banners','reduce'=>'banner'));
                ?>
            </div>
        </div>
        
       <!-- <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP 
                      //  echo $this->element('Painel.image',array('label'=>'Banner (Tamanho em pixels: 650x300)','name'=>'thumb_mobile','table'=>'tb_banners','reduce'=>'banner'));
                ?>
            </div>
        </div> -->
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>