<?PHP 
    echo $this->Form->create('CategoriaEmpresa',array('url'=>array('plugin'=>'empresas','controller'=>'categoria_empresas','action'=>'add')));
?>

<div class="row">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Categoria</h5>
                
                <div class="form-row">
                    <div class="col-md-12">
                        <?PHP 
                            echo '<div class="position-relative form-group">';
                                echo $this->Form->input('title',array('label'=>'Título','class'=>'form-control')); 
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?PHP echo $this->element('Painel.image',array('label'=>'Ícone (36x36)','name'=>'icone','table'=>'tb_empresas_categorias')); ?>
            </div>
        </div>
        
    </div>
</div>
    
    
<?PHP
        echo '<button class="mt-2 btn btn-primary">Salvar</button>';
        echo $this->Form->hidden('id');
    echo $this->Form->end();
?>
