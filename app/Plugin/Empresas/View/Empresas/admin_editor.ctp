<?PHP 
    echo $this->Form->create('Empresa',array('url'=>array('action'=>'add')));
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Parceiro</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';
                            
                           // echo '<div class="position-relative form-group">';
                             //   echo $this->Form->input('categoria_id',array('label'=>'Tipo','options'=>$categorias,'class'=>'custom-select'));
                           // echo '</div>';
                            
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('link_site',array('label'=>'Link do site','class'=>'form-control')); 
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Logo (350x200)','name'=>'imagem','table'=>'tb_empresas')); ?>
            </div>
        </div>
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
