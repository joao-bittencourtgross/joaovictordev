<?PHP 
    $post = array_shift($post); 
?>

<fieldset class="box">
    <dl class="description">
        <dt>Nome:</dt><dd><?PHP echo $post['nome']?></dd>
        <dt>E-mail:</dt><dd><?PHP echo $post['email']?></dd>
        <dt>Telefone:</dt><dd><?PHP echo $post['telefone']?></dd>  
        <dt>Mensagem</dt><dd><?PHP echo $post['mensagem']?></dd>
        <dt>Enviado em:</dt><dd><?PHP echo $post['cdate']?></dd>
    </dl>    
</fieldset>

<style>
    dl.description > dt {
        width: 280px;
    }
</style>