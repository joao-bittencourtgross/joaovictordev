<footer>

    <div class="container">
        <div class="flex-footer">
            <div class="logo-footer">
                <?php echo $this->Html->link("<h1>João Victor</h1>", array('plugin'=>false, 'controller'=>'pages', 'action'=>'home'), array('escape'=>false)) ?>
            </div>
            <div class="links-footer">
                <?php echo $this->Html->link('(46) 99918-2305', array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'index')) ?>
                <?php echo $this->Html->link('joaovictor@joaovictor.dev.br', 'mailto:joaovictor@joaovictor.dev.br') ?>
                <div class="links-footer-socials">
                    <?php echo $this->Html->link($this->Html->image('github.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'github'), array('escape'=>false, 'alt'=>'Github')) ?>
                    <?php echo $this->Html->link($this->Html->image('linkedin.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'linkedin'), array('escape'=>false, 'alt'=>'Linkedin')) ?>
                    <?php echo $this->Html->link($this->Html->image('instagram.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'instagram'), array('escape'=>false , 'alt'=>'Instagram')) ?>
                </div>
            </div>
        </div>
        <span class="line-footer"></span>
        <div class="flex-footer">
            <div class="nav-footer">
                <nav>
                    <ul>
                        <li><?php echo $this->Html->link('Home', array('plugin'=>false, 'controller'=>'pages', 'action'=>'home')) ?></li>
                        <li><?php echo $this->Html->link('Sobre', array('plugin'=>'aempresa', 'controller'=>'aempresa', 'action'=>'index')) ?></li>
                        <li><?php echo $this->Html->link('Tecnologias', $this->Html->url('/#tecnologias', true)) ?></li>
                        <li><?php echo $this->Html->link('Projetos', $this->Html->url('/#projetos', true)) ?></li>
                        <li><?php echo $this->Html->link('Contato', array('plugin'=>'contatos', 'controller'=>'contatos', 'action'=>'index')) ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</footer>