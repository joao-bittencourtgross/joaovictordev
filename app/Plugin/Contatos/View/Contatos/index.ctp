<?PHP if(isset($add_sucess) && $add_sucess){ ?>
    
    <div class="container">
        <div class="msg-add-sucess"> 
            Dados enviados com sucesso!
        </div>
    </div>

    <script>
        setTimeout(function(){ 
            window.location.href='<?= $this->Html->url('/',true); ?>';
        },5388);
    </script>

<?PHP }else{ ?>

<?php echo $this->element('contato'); ?>
    
<?PHP } ?>