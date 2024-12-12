<header>

    <div class="container">
        <div class="row flex-header">
            <div class="logo">
                <?php echo $this->Html->link($this->Html->image('logo.png', array('alt'=>'Logo', 'escape'=>false)), array('plugin'=>false, 'controller'=>'pages', 'action'=>'home'), array('escape'=>false)) ?>
            </div>
            <div class="menu-mobile"><i class="fas fa-bars"></i></div>
            <div class="links">
                <nav>
                    <ul>
                        <li><?php echo $this->Html->link('Home', array('plugin'=>false, 'controller'=>'pages', 'action'=>'home')) ?></li>
                        <li><?php echo $this->Html->link('Sobre', array('plugin'=>'aempresa', 'controller'=>'aempresa', 'action'=>'index')) ?></li>
                        <li><?php echo $this->Html->link('Tecnologias', $this->Html->url('/#tecnologias', true)) ?></li>
                        <li><?php echo $this->Html->link('Projetos', $this->Html->url('/#projetos', true)) ?></li>
                        <li><?php echo $this->Html->link('Contato', array('plugin'=>'contatos', 'controller'=>'contatos', 'action'=>'index')) ?></li>
                        <div class="links-socials">
                            <li><?php echo $this->Html->link($this->Html->image('github.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'github'), array('escape'=>false, 'alt'=>'Github')) ?></li>
                            <li><?php echo $this->Html->link($this->Html->image('linkedin.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'linkedin'), array('escape'=>false, 'alt'=>'Linkedin')) ?></li>
                            <li><?php echo $this->Html->link($this->Html->image('instagram.svg', array('escape'=>false)), array('plugin'=>'clique_whats', 'controller'=>'clique_whats', 'action'=>'redirect_sociais', 'slug'=>'instagram'), array('escape'=>false , 'alt'=>'Instagram')) ?></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</header>