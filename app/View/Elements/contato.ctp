<section class="container-contact">
    <div class="container">
        <div class="row">
            <div data-aos="fade-right" class="text-contact six columns">
                <h1>Mande sua mensagem</h1>
                <p>Responderei o mais breve possível</p>
            </div>
            <div data-aos="fade-left" class="form-contact six columns">
                <form action="<?= $this->Html->url('/contato',true); ?>" method="post">
                    <input type="text" name="data[Contato][nome]" placeholder="Nome" required>
                    <input type="text" name="data[Contato][telefone]" placeholder="Telefone" onkeyup="mascara(this,mtel)">
                    <input type="email" name="data[Contato][email]" placeholder="E-mail" required>
                    <textarea name="data[Contato][mensagem]" id="mensagem" cols="30" rows="10" placeholder="Mensagem" required></textarea>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</section>