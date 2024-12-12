<?PHP 
    echo $this->Form->create('BannerContato',array('url'=>array('plugin'=>'banners','controller'=>'banner_contato','action'=>'add')));
//    pre($this->data);
?>

<div class="row">
    <div class="col-md-9">
<!--        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Banners</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('texto_inicial',array('label'=>'Texto página inicial','class'=>'ckeditor'));
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>-->
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Banner Contato (Largura: 1920px)','name'=>'img_contato','table'=>'tb_banners_contatos','reduce'=>'banner')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Banner Seja Fornecedor (Largura: 1920px)','name'=>'img_fornecedor','table'=>'tb_banners_contatos','reduce'=>'banner')); ?>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Banner Trabalhe Conosco (Largura: 1920px)','name'=>'img_tc','table'=>'tb_banners_contatos','reduce'=>'banner')); ?>
            </div>
        </div>
        
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
