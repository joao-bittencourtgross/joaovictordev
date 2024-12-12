<?PHP
$fields = array(
    '0'=>'Esta página não contém nenhum formulário de contato',
    'reserva'=>'Formulário de Reserva do Hotel de Trânsito de Oficiais',
    'fornecedores'=>'Formulário para Cadastro de Fornecedores',
    'contato'=>'Formulário de Contato',
);
?>

<fieldset class="box formulario sectorized" data-sector="form" >
    <legend><?PHP echo $label?></legend>
    <?PHP
    echo $this->Form->input('form',array('label'=>'Qual formulário deseja incluir nessa página','type'=>'select','options'=>$fields));
    ?>
</fieldset>