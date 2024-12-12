<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'locationiq/functions');

class PagesController extends AppController {

    public function admin_index() {
        $this->layout = "Painel.admin";
        exit;
    }

    public $uses = array(
        'Aempresa.Aempresa',
        'Produtos.Produto',
        'Certificacoes.Certificacao',
    );
        
    public function home() {
        $projetos = $this->Produto->find('all',array(
            'order'      => array('Produto.order_registro'=>'ASC', 'Produto.created'=>'DESC'),
        ));

        $tecnologias = $this->Certificacao->find('all',array(
            'order'      => array('Certificacao.order_registro'=>'ASC', 'Certificacao.created'=>'DESC')
        ));

        $sobre = $this->Aempresa->find('first');

        $this->set('sobre',$sobre);
        $this->set('projetos',$projetos);
        $this->set('tecnologias',$tecnologias);
    }
    
    public function load_login(){
        $this->autoRender = true;
        $this->layout = false;
    }
    
    public function page404(){
        $this->Seo->title('Página não encontrada');
    }

    public function indisponivel(){
        $this->layout = false;
        $this->Seo->title('Página indisponível');
    }
    
}