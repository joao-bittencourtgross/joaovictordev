<?PHP
if($this->request->params['plugin']=='produtos' && $this->request->params['controller']=='produtos' && $this->request->params['action']=='index'){
    $this->Paginator->options(array('url'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'index','tipo'=>$this->params['tipo'],'slug'=>$this->params['slug'])));
}

if($this->request->params['plugin']=='produtos' && $this->request->params['controller']=='produtos' && $this->request->params['action']=='index' && isset($this->params['sub'])){
    $this->Paginator->options(array('url'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'index','tipo'=>$this->params['tipo'],'slug'=>$this->params['slug'],'sub'=>$this->params['sub'])));
}

if  (
        $this->request->params['plugin']     == 'produtos' && 
        $this->request->params['controller'] == 'produtos' && 
        $this->request->params['action']     == 'index' && 
        isset($this->params['tipo']) &&
        isset($this->params['slug']) &&
        isset($_GET['fp']) 
    )
{
    $this->Paginator->options(
            array('url'=> array('plugin'=>'produtos','controller'=>'produtos','action'=>'index',
                                'tipo'=>$this->params['tipo'], 'slug'=>$this->params['slug'], '?'=>array('fp'=>$_GET['fp'])
                            )));
}

if  (
        $this->request->params['plugin']     == 'produtos' && 
        $this->request->params['controller'] == 'produtos' && 
        $this->request->params['action']     == 'index' && 
        isset($this->params['tipo']) &&
        isset($this->params['slug']) &&
        isset($_GET['order'])
    )
{
    $this->Paginator->options(
            array('url'=> array('plugin'=>'produtos','controller'=>'produtos','action'=>'index',
                                'tipo'=>$this->params['tipo'], 'slug'=>$this->params['slug'], '?'=>array('order'=>$_GET['order'])
                            )));
}

if  (
        $this->request->params['plugin']     == 'produtos' && 
        $this->request->params['controller'] == 'produtos' && 
        $this->request->params['action']     == 'index' && 
        isset($this->params['tipo']) &&
        isset($this->params['slug']) &&
        isset($_GET['fp']) &&
        isset($_GET['order'])
    )
{
    $this->Paginator->options(
            array('url'=> array('plugin'=>'produtos','controller'=>'produtos','action'=>'index',
                                'tipo'=>$this->params['tipo'], 'slug'=>$this->params['slug'], '?'=>array('fp'=>$_GET['fp'],'order'=>$_GET['order'])
                            )));
}

if($this->request->params['plugin']=='produtos' && $this->request->params['controller']=='produtos' && $this->request->params['action']=='loja'){
    $this->Paginator->options(array('url'=>array('plugin'=>'produtos','controller'=>'produtos','action'=>'loja','loja'=>$this->params['loja'])));
}

if($this->request->params['plugin']=='noticias' && $this->request->params['controller']=='noticias' && $this->request->params['action']=='index' && isset($this->params['slug'])){
    $this->Paginator->options(array('url'=>array('plugin'=>'noticias','controller'=>'noticias','action'=>'index','slug'=>$this->params['slug'])));
}

if($this->request->params['plugin']=='lojas' && $this->request->params['controller']=='lojas' && $this->request->params['action']=='index' && isset($this->params['slug'])){
    $this->Paginator->options(array('url'=>array('plugin'=>'lojas','controller'=>'lojas','action'=>'index','slug'=>$this->params['slug'])));
}

if($this->request->params['plugin']=='lojas' && $this->request->params['controller']=='lojas' && $this->request->params['action']=='view' && isset($this->params['slug'])){
    $this->Paginator->options(array('url'=>array('plugin'=>'lojas','controller'=>'lojas','action'=>'view','slug'=>$this->params['slug'])));
}

if  (
        $this->request->params['plugin']     == 'lojas' && 
        $this->request->params['controller'] == 'lojas' && 
        $this->request->params['action']     == 'view' && 
        isset($this->params['slug']) &&
        isset($_GET['order'])
    )
{
    $this->Paginator->options(
        array('url'=>array('plugin'=>'lojas','controller'=>'lojas','action'=>'view','slug'=>$this->params['slug'],'?'=>array('order'=>$_GET['order'])))
    );
}

if  (
        $this->request->params['plugin']     == 'lojas' && 
        $this->request->params['controller'] == 'lojas' && 
        $this->request->params['action']     == 'view' && 
        isset($this->params['slug']) &&
        isset($_GET['c']) &&
        isset($_GET['s']) &&
        isset($_GET['order']) 
    )
{
    $this->Paginator->options(
        array('url' => array(
                        'plugin'=>'lojas','controller'=>'lojas','action'=>'view','slug'=>$this->params['slug'],
                        '?' => array('c'=>$_GET['c'], 's'=>$_GET['s'], 'order'=>$_GET['order'])
                    ))
    );
}

if($this->Paginator && $this->Paginator->hasPage(2)):
    if(!isset($prev)) $prev='«';
    if(!isset($next)) $next='»';
    if(!isset($separator)) $separator=false;
?>
<nav class="paginator">
    <?PHP
        echo $this->Paginator->prev($prev);
        echo $this->Paginator->numbers(array('separator'=>$separator));
        echo $this->Paginator->next($next);
    ?>
</nav>
<?PHP endif; ?>