<?PHP
class MenssageComponent extends Component {
    
    public function message_empty($text){
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<script type="text/javascript">';
        echo 'alert("'.$text.'");';
        echo 'history.go(-1);';
        echo '</script>';
        exit; 
    }
    
}