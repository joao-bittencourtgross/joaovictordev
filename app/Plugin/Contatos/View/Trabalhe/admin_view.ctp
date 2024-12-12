<?PHP 
    $post = array_shift($post); 
?>

<fieldset class="box">
    <dl class="description">
        <dt>Nome:</dt><dd><?PHP echo $post['nome']?></dd>
        <dt>E-mail:</dt><dd><?PHP echo $post['email']?></dd>
        <dt>Telefone:</dt><dd><?PHP echo $post['telefone']?></dd>
        <dt>Cidade:</dt><dd><?PHP echo $post['cidade']?></dd>
        <dt>Estado:</dt><dd><?PHP echo $post['estado']?></dd>
        <dt>Mensagem</dt><dd><?PHP echo $post['mensagem']?></dd>
        
        <?PHP if($post['curriculo']){ ?>
            <dt>&nbsp;</dt><dd>&nbsp;</dd>
            <a style="color: blue;" href="<?PHP echo $this->base.'/'.$post['curriculo']; ?>" target="_blank">ver currículo</a>
        <?PHP } ?>
            
        <dt>&nbsp;</dt><dd>&nbsp;</dd>
        <dt>Enviado em:</dt><dd><?PHP echo $post['cdate']?></dd>
    </dl>    
</fieldset>

<style>
    dl.description > dt {
        width: 280px;
    }
</style>