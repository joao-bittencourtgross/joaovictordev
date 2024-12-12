<?PHP
class RelatorioController extends AcessoSiteAppController{
    
    public $components = array('Help');
    
    public function semanal(){
        $this->autoRender = false;
        $this->layout = false;
        
//        $data_hoje = date('d/m/Y', strtotime('-1 day'));
        $data_hoje = date('d/m/Y');
        $data_semana = date('d/m/Y', strtotime('-7 days', strtotime(date('Y/m/d'))));
        
        $data_inicial = $this->Help->change_save_date($data_semana);
        $data_final = $this->Help->change_save_date($data_hoje);
        
//        $sql_where_date = array('DATE_FORMAT(created,"%Y-%m-%d") BETWEEN ? and ?' => array($date_begin, $date_end));
        $sql_where = 'WHERE (DATE_FORMAT(created,"%Y-%m-%d") BETWEEN "'.$data_inicial.'" AND "'.$data_final.'")';
        
        $paginas_mv = $this->AcessoSite->query('
            SELECT *, COUNT(pagina) AS Total FROM as_paginas AS AcessoSite '.$sql_where.' GROUP BY pagina ORDER BY COUNT(pagina) DESC LIMIT 15;
        ');
        
        $plataformas = $this->AcessoSite->query('
            SELECT *, COUNT(plataforma) AS Total FROM as_paginas AS AcessoSite '.$sql_where.' GROUP BY plataforma ORDER BY COUNT(plataforma) DESC;
        ');
        
        $count_cr_whats = $this->CliqueWhats->find('count',array('conditions'=>array('CliqueWhats.created BETWEEN ? AND ?' => array($data_inicial,$data_final)),));
        $count_cr_facebook = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'facebook', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_instagram = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'instagram', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_youtube = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'youtube', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_twitter = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'twitter', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        $count_cr_linkedin = $this->CliqueSocial->find('count',array('conditions'=>array('tipo'=>'linkedin', 'CliqueSocial.created BETWEEN ? AND ?'=>array($data_inicial,$data_final))));
        
        $count_contatos = $this->Contato->find('count',array('conditions' => array('Contato.created BETWEEN ? AND ?' => array($data_inicial,$data_final))));
     
        $outro = $this->Outro->find('first');
        $send_mail = array();
        if($outro['Outro']['relatorios']){
            $expld = explode(';',$outro['Outro']['relatorios']);
            foreach ($expld as $key => $value) {
                $send_mail[] = trim($value);
            }
        }
        
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('AcessoSite.semanal');
        
        if($send_mail){
            $mail->to($send_mail);
            $mail->bcc('artur@amexcom.com.br');
        }else{
            $mail->to('artur@amexcom.com.br');
        }
        
//        $mail->to(array('destro@destrodistribuidor.com.br','rafael@amexcom.com.br'));
//        $mail->bcc('artur@amexcom.com.br');
        
        $mail->emailFormat('html');
        $mail->subject('Relatório Semanal - '.$data_semana.' - '.$data_hoje.'');
        $vars = array(
            'paginas_mv'         => $paginas_mv, 
            'data_semana'        => $data_semana, 
            'data_hoje'          => $data_hoje, 
            'plataformas'        => $plataformas,
            'count_cr_whats'     => $count_cr_whats,
            'count_cr_facebook'  => $count_cr_facebook,
            'count_cr_instagram' => $count_cr_instagram,
            'count_cr_youtube'   => $count_cr_youtube,
            'count_cr_twitter'   => $count_cr_twitter,
            'count_cr_linkedin'  => $count_cr_linkedin,
            'count_contatos'     => $count_contatos,
        );
        $mail->viewVars($vars);
        $mail->send();
    }
    
}