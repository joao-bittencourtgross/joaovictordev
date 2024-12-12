<?PHP
class Video extends PainelAppModel{
    
    public $virtualFields=array(
        'default'=>"CONCAT('https://img.youtube.com/vi/',yid,'/mqdefault.jpg')",
        'link'=>"CONCAT('https://www.youtube.com/watch?v=',yid)",
        'embed'=>"CONCAT('https://www.youtube.com/embed/',yid)",
    );
    
}