<?PHP
class RelatorioController extends DashAppController{
    
    public $components = array('Help');
    
    public function admin_semanal(){
        $this->autoRender = false;
        $this->layout = false;
        $arr_data = array();
        
//        $data_hoje = date('d/m/Y');
        $data_hoje = date('d/m/Y', strtotime('-1 day'));
        $data_semana = date('d/m/Y', strtotime('-7 days', strtotime(date('Y/m/d'))));
        
        $date_begin = $this->Help->change_save_date($data_semana);
        $date_end = $this->Help->change_save_date($data_hoje);
        $sql_where_date = array('DATE_FORMAT(created,"%Y-%m-%d") BETWEEN ? and ?' => array($date_begin, $date_end));
        
        pre('mama');
        
        
        App::uses('CakeEmail','Network/Email');
        $mail = new CakeEmail('smtp');
        $mail->template('Dash.semanal');
        
//        $mail->to('web@amexcom.com.br');
        $mail->to(array('artur@amexcom.com.br'));
//        $mail->bcc('web@amexcom.com.br');
        
        $mail->emailFormat('html');
        $mail->subject('Relatório Semanal - '.$data_semana.' - '.$data_hoje.'');
        $mail->viewVars(array('data'=>$arr_data, 'data_semana'=>$data_semana, 'data_hoje'=>$data_hoje));
        $mail->send();
    }
    
}