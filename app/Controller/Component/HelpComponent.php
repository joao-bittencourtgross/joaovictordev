<?PHP
class HelpComponent extends Component {
    
    function floorp($val, $precision = 2){
        $mult = pow(10, $precision);    
        return floor($val * $mult) / $mult;
    }
    
    public function floor_dec($number,$precision = 2,$separator = '.') {
        $numberpart=explode($separator,$number);
        $numberpart[1]=substr_replace($numberpart[1],$separator,$precision,0);
        if($numberpart[0]>=0) {
          $numberpart[1]=substr(floor('1'.$numberpart[1]),1);
        } else {
          $numberpart[1]=substr(ceil('1'.$numberpart[1]),1);
        }
        $ceil_number= array($numberpart[0],$numberpart[1]);
        return implode($separator,$ceil_number);
    }
    
    public function message_empty($text){
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<script>';
        echo 'alert("'.$text.'");';
        echo 'history.go(-1);';
        echo '</script>';
        exit; 
    }
    
    public function message_empty_link($text,$link){
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<script>';
        echo 'alert("'.$text.'");';
        echo 'window.location.href = "'.$link.'"';
        echo '</script>';
        exit; 
    }
    
    public function get_ip(){  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }else  {  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }
    
    public function change_save_value($valor){
        if($valor){
            $value_bd = str_replace('.', '', trim($valor));
            $value_bd = str_replace(',', '.', $value_bd);
            return $value_bd;
        }
    }
    
    public function change_save_date($data){
        $expld = explode('/', $data);
        if(count($expld) === 3){
            return $expld[2].'-'.$expld[1].'-'.$expld[0];
        }else{
            self::message_empty('Ocorreu algum erro com a data.');
        }
    }
    
    public function show_mask_date($data){
        $expld = explode('-', $data);
        return $expld[2].'/'.$expld[1].'/'.$expld[0];
    }
    
    public function invert_date($data){
        $expld = explode('-', $data);
        return $expld[2].'-'.$expld[1].'-'.$expld[0];
    }
    
    public function mes_extenso($data){
        $exp = explode('-', $data);
        
        $meses = array(
                    '01' => 'Janeiro',
                    '02' => 'Fevereiro',
                    '03' => 'Março',
                    '04' => 'Abril',
                    '05' => 'Maio',
                    '06' => 'Junho',
                    '07' => 'Julho',
                    '08' => 'Agosto',
                    '09' => 'Setembro',
                    '10' => 'Outubro',
                    '11' => 'Novembro',
                    '12' => 'Dezembro'
                );
        
        return $meses[$exp[1]];
    }

    public function is_mobile(){
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            return true;
        }else{
            return false;
        }
    }
    
    public function valida_cpf($cpf=null) {
        if(empty($cpf)) {
            return false;
        }

        $cpf = preg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11) {
            return false;
        }else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         }else{   
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
    
    public function verify_text($text){
        $find = false;
        
        foreach ($this->return_words() as $palavra) {
            $text_str_low = mb_strtolower($text,'UTF-8');
            
            $verify = strripos($text_str_low, $palavra);
            if($verify){
                $find = true;
                break;
            }
        }
        return $find;
    }
    
    public function return_words(){
        $words = array(
            'admin',
            'semanal',
            '.xml', 
            '.js', 
            '.json', 
            '.png', 
            '.jpg', 
            '.jpeg', 
            '.txt', 
            'new', 
            '/tech', 
            '/wp', 
            '/old', 
            '/wordpress', 
            '/landing', 
            '/test', 
            '.ico', 
            '.gif', 
            'favicon', 
            'databases', 
            'databases.yml', 
            'Microsoft', 
            '/evil', 
            '/login', 
            'wp-login.php', 
            '/console', 
            '/atutor', 
            'index.php', 
            '/login', 
            '/temp', 
            '404', 
            '.woff', 
            '.ttf', 
            'recover', 
        );
        
        return $words;
    }       
    
    public function create_session(){
        $novo_valor = date('dmY');
        $valor = "abcdefghijklmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        for ($i = 0; $i < 18; $i++){
            $novo_valor .= $valor[rand()%strlen($valor)];
        }
        $novo_valor .= date('His');
        return strtoupper($novo_valor);
    }
    
    public function mostra_mes_extenso($numero){
        $meses = array(
            '1' => 'Janeiro',
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '2' => 'Fevereiro',
            '03' => 'Março',
            '3' => 'Março',
            '04' => 'Abril',
            '4' => 'Abril',
            '05' => 'Maio',
            '5' => 'Maio',
            '06' => 'Junho',
            '6' => 'Junho',
            '07' => 'Julho',
            '7' => 'Julho',
            '08' => 'Agosto',
            '8' => 'Agosto',
            '09' => 'Setembro',
            '9' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro',
        );
        
        return $meses[$numero];
    }
    
    public function save_platform(){
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            return 'mobile';
        }else{
            return 'desktop';
        }
    }
    
    public function arr_cidade_uf(){
        $cidades = array(
            'cascavel-pr'     => 'Cascavel - PR',
            'campo-grande-ms' => 'Campo Grande - MS',
        );
        return $cidades;
    }
    
}