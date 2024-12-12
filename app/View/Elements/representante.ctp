<section class="container-contact">
    <div class="container">
        <div class="row">
            <div class="text-contact six columns">
                <h2>Seja um</h2>
                <h1>Representante</h1>
                <p>Preencha os campos ao lado para entrar em contato com nosso setor de representantes. Iremos lhe atender o mais breve possível.</p>
            </div>
            <div class="form-contact six columns">
                <form action="<?= $this->Html->url('/representante',true); ?>" method="post">
                    <input type="text" name="data[ContatoProdutor][nome]" placeholder="Nome" required>
                    <div class="row">
                        <div class="six columns">
                            <input type="text" name="data[ContatoProdutor][telefone]" placeholder="Telefone" onkeyup="mascara(this,mtel)" required>
                        </div>
                        <div class="six columns">
                            <input type="text" name="data[ContatoProdutor][cnpj]" placeholder="CNPJ" onkeyup="mascara(this,Cnpj)" required>
                        </div>
                    </div>
                    <input type="email" name="data[ContatoProdutor][email]" placeholder="E-mail" required>
                    <div class="row">
                        <div class="six columns">
                            <input type="text" name="data[ContatoProdutor][cidade]" placeholder="Cidade" required>
                        </div>
                        <div class="six columns">
                            <input type="text" name="data[ContatoProdutor][estado]" placeholder="Estado" required>
                        </div>
                    </div>
                    <textarea name="data[ContatoProdutor][mensagem]" id="mensagem" cols="30" rows="10" placeholder="Mensagem" required></textarea>
                    <div class="flex-form-contact">
                        <input type="checkbox" name="data[ContatoProdutor][privacidade]" id="privacidade" value="1">
                        <label for="privacidade">Declaro que li e concordo com a <?php echo $this->Html->link('Política de Privacidade e Termos de Uso', array('plugin'=>'termo', 'controller'=>'termo', 'action'=>'politica'))?></label>
                    </div>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</section>