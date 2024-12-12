<?PHP

if (!isset($GLOBALS['__share'])) {
    echo $this->Html->tag('script', "window.___gcfg = {lang: 'pt-BR'};", array('type' => 'text/javascript'));
    $this->Html->css('Painel.share.less', 'stylesheet/less', array('inline' => false));
    $this->Html->script('//apis.google.com/js/plusone.js', array('inline' => false));
    $this->Html->script('//platform.twitter.com/widgets.js', array('inline' => false));
    $GLOBALS['__share'] = true;
}

if (!isset($url)) $url = $this->Html->url(null, true);
if (!isset($title)) $title = "Estou compartilhando este link com vocês: ";
if (!isset($align)) $align='left';


$clear='<br style="clear: both;font-size:0;line-height:0;" />';
echo $clear;
$socials = array();


#### FACEBOOK ####
$fburl = "http://www.facebook.com/plugins/like.php?href=$url&send=false&layout=button_count&show_faces=false&action=like&colorscheme=light&font=arial";
$item = $this->Html->tag('iframe', '', array('src' => $fburl));
$socials[] = $this->Html->tag('div', $item, array('class' => 'facebook social-icon'));

#### TWITTER ####
$item = $this->Html->link('Tweet', 'https://twitter.com/share', array('class' => 'twitter-share-button', 'data-url' => $url, 'data-text' => $title));
$socials[] = $this->Html->tag('div', $item, array('class' => 'twitter social-icon'));

#### GOOGLE PLUS ####
$item = $this->Html->tag('div', '', array('class' => 'g-plusone', 'data-size' => 'medium', 'data-href' => $url));
$socials[] = $this->Html->tag('div', $item, array('class' => 'plus social-icon'));

#### PINTEREST ####
if (isset($image) && !empty($image)) {
    $image = $this->Html->url($this->Crop->url($image, 200, 200, true), true);
    $pinurl = "http://pinterest.com/pin/create/button/?url=$url&media=$image&description=".urlencode($title);
    $icopin = $this->Html->image('http://assets.pinterest.com/images/PinExt.png');
    $item = $this->Html->link($icopin, $pinurl, array('class' => 'pin-it-button',  'target' => '_blank', 'escape' => false));
    $socials[] = $this->Html->tag('div', $item, array('class' => 'pinterest social-icon'));
}

if(isset($align) && $align=='right'){
    $socials=  array_reverse($socials);
}
echo $this->Html->tag('div', implode("\n", $socials), array('class' => 'social '.$align));
echo $clear;
?>