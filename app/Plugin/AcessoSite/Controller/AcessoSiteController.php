<?PHP
class AcessoSiteController extends AcessoSiteAppController {
    
    public $paginate = array('limit'=>20,'order'=>array('created'=>'DESC'));
    public $components = array('Help');
    
    public function admin_view(){
        $this->layout = 'Painel.admin';
        
//        $show_df = date('d/m/Y');
        $show_df = date('d/m/Y', strtotime('+1 days', strtotime(date('Y-m-d'))));
        $show_di = date('d/m/Y', strtotime('-7 days', strtotime(date('Y-m-d'))));
//        pre($show_df);
        
        if(isset($_GET['dbegin']) && isset($_GET['dend'])){
            $show_di = urldecode($_GET['dbegin']);
            $show_df = urldecode($_GET['dend']);
//            pre($show_df);
        }
        
        
        $data_inicial = $this->Help->change_save_date($show_di);
        $data_final = $this->Help->change_save_date($show_df);
        
        $sql_where = 'WHERE (DATE_FORMAT(created,"%Y-%m-%d") BETWEEN "'.$data_inicial.'" AND "'.$data_final.'")';
        
        $paginas_mv = $this->AcessoSite->query('
            SELECT *, COUNT(pagina) AS Total FROM as_paginas AS AcessoSite '.$sql_where.' GROUP BY pagina ORDER BY COUNT(pagina) DESC LIMIT 13;
        ');
        
//        $paginas_mv_unico = $this->AcessoSite->query('
//            SELECT *, COUNT(pagina) AS Total, COUNT(sessao) AS Tsessao FROM as_paginas AS AcessoSite '.$sql_where.' GROUP BY sessao ORDER BY COUNT(pagina) DESC;
//        ');
        
        $acessos_meses = $this->AcessoSite->query('
            SELECT MONTH(created) AS mes, YEAR(created) AS ano, count(*) AS Total FROM as_paginas GROUP BY MONTH(created) ORDER BY YEAR(created), MONTH(created);'
        );
        
        $plataforma = $this->AcessoSite->query('
            SELECT *, COUNT(plataforma) AS Total FROM as_paginas AS AcessoSite '.$sql_where.' GROUP BY plataforma ORDER BY COUNT(plataforma) DESC;
        ');
        
        
        $chart_labels = $this->chart_labels($paginas_mv);
        $chart_number = $this->chart_numbers($paginas_mv);
        
        $chart_month_data = $this->chart_month_data($acessos_meses);
        $chart_month_label = $this->chart_month_label($acessos_meses);
        
        $chart_plataforma_data = $this->chart_plataforma_data($plataforma);
        $chart_plataforma_label = $this->chart_plataforma_label($plataforma);
        
        $contatos = $this->Contato->find('all',array(
//            'conditions' => array('Contato.created BETWEEN ? AND ?' => array($data_inicial,$data_final)),
            'order'      => 'Contato.created DESC',
            'limit'      => '6',
        ));
//        pre($contatos);
        
        $count_cr_whats = $this->CliqueWhats->find('count',array('conditions'=>array('CliqueWhats.created BETWEEN ? AND ?' => array($data_inicial,$data_final)),));
        
        $count_cr_facebook = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'facebook', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_instagram = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'instagram', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_youtube = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'youtube', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_twitter = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'twitter', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
//        pre($count_cr_facebook);

        $this->set(compact('show_di','show_df','paginas_mv','chart_labels','chart_number','chart_month_data','chart_month_label','contatos'));
        $this->set(compact('chart_plataforma_data','chart_plataforma_label'));
        $this->set(compact('count_cr_whats','count_cr_facebook','count_cr_instagram','count_cr_youtube','count_cr_twitter'));
    }
    
    public function chart_labels($paginas){
        $chart_values = "[";
        foreach ($paginas as $pagina) {
            $chart_values .= "'".$pagina[0]['Total'].' - '.$pagina['AcessoSite']['pagina']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
    public function chart_numbers($paginas){
        $chart_values = "[";
        foreach ($paginas as $pagina) {
            $chart_values .= "'".$pagina[0]['Total']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
    public function chart_month_data($acessos_meses){
        $chart_values = "[";
        foreach ($acessos_meses as $acesso_mes) {
            $chart_values .= "'".$acesso_mes[0]['Total']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
    public function chart_month_label($acessos_meses){
        $chart_values = "[";
        foreach ($acessos_meses as $acesso_mes) {
            $chart_values .= "'".$this->Help->mostra_mes_extenso($acesso_mes[0]['mes']).'/'.$acesso_mes[0]['ano']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
    public function chart_plataforma_data($plataforma){
        $chart_values = "[";
        foreach ($plataforma as $plataform) {
            $chart_values .= "'".$plataform[0]['Total']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
    public function chart_plataforma_label($plataforma){
        $chart_values = "[";
        foreach ($plataforma as $plataform) {
            $chart_values .= "'".$plataform['AcessoSite']['plataforma']."'".', ';
        }
        $chart_values = substr($chart_values,0, strlen($chart_values)-2).']';
        return $chart_values;
    }
    
}