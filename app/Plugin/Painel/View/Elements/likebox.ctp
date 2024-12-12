<?PHP
if(isset($user)):

if(!isset($width)) $width=600;
if(!isset($height)) $height=300;
if(!isset($color)) $color="light";


if(!isset($faces)) $faces=true;
if(!isset($stream)) $stream=false;
if(!isset($header)) $header=false;

$faces=$faces?'true':'false';
$stream=$stream?'true':'false';
$header=$header?'true':'false';

$url='//www.facebook.com/plugins/likebox.php?href=';
$url.=urlencode("https://www.facebook.com/$user");
$url.="&amp;width=$width";
$url.="&amp;height=$height";
$url.="&amp;show_faces=$faces";
$url.="&amp;colorscheme=$color";
$url.="&amp;stream=$stream";
$url.="&amp;border_color";
$url.="&amp;header=$header";
?>
<iframe src="<?=$url?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?=$width?>px; height:<?=$height?>px;" allowTransparency="true"></iframe>
<?PHP endif; ?>