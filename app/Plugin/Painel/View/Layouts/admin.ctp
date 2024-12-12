<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        
        <meta name="robots" CONTENT="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

        <link rel="icon" type="image/png" sizes="32x32" href="<?PHP echo $this->Html->url('/pnl/assets/images/favicon.png',true); ?>">
        <title>admin</title>
        <script>
            var base = '<?= $this->base ?>';
        </script>
        <?PHP
            echo $this->Html->css('/pnl/jqueryui/jquery-ui.min');
            
            echo $this->Html->css('/pnl/main');
//            echo $this->Html->css('/datepicker/jquery-ui-1.9.0');
            echo $this->Less->css('admin'); 
            
            echo $this->Html->script('/pnl/jquery3.1.0.min');
            echo $this->Html->script('/painel/ckeditor/ckeditor.js');
            
//            
            echo $this->Html->script('/pnl/metisMenu.min');
            
            echo $this->Html->script('/js/less');
//            echo $this->Html->script('/datepicker/jquery-ui-1.9.0');
            
            echo $this->Html->script('/pnl/jqueryui/jquery-ui.min');
            echo $this->Html->script('/pnl/js');
        ?>
        
        <!--<script src="<?PHP // echo $this->Html->url('/pnl/main_desc.js?'.rand(1000, 10000).date('YmdHs'),true); ?>"></script>-->
    </head>

<body>
    
    
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">

            <div class="app-header__logo">
                <div class="logo-src"><?PHP // echo $this->Html->image('/pnl/assets/images/logo.png'); ?></div>
                <!--<div class="logo-src"></div>-->
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>

            <div class="app-header__content">
<!--                    <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>-->

                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn" id="btn_ar">
                                            <?PHP echo $this->Html->image('/pnl/assets/images/avatars/person2.jpg',array('width'=>'42','class'=>'rounded-circle')); ?>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <?PHP echo $this->Locker->link('Alterar senha', array('plugin'=>'painel','controller'=>'usuarios','action'=>'password'), array('class'=>'dropdown-item')); ?>
                                            <?PHP echo $this->Html->link('Sair',  array('plugin'=>'painel','controller'=>'usuarios','action'=>'logout'), array('class'=>'dropdown-item')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">

                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>

                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
<!--                                <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="index.html" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Dashboard Example 1
                                </a>
                            </li>-->

                            <li class="app-sidebar__heading">Menu</li>
                            <?PHP
                                $menus = Configure::read('Painel.menu');
                                
                                foreach ($menus as $key => $menu){
                                    
                                    if($key === 'Usuarios' && $this->Session->read('Auth.User.group') !== 'amexcom'){
                                        
                                    }else{
                                       
                                        $plus = '';
                                        $active = '';

                                        if(count($menu) > 1){
                                            $plus = '';
                                            foreach ($menu as $k => $v){
                                                $active_inner = '';
                                                if($this->here == $this->Html->url($v)) {
                                                    $active = 'mm-active';
                                                    $active_inner = 'mm-active';
                                                }

                                                if ($k == 'separator' || $v == 'separator') {
                                                    if ($plus != ''){
                                                        $plus .= '';
                                                    }
                                                }else{
    //                                                $plus .= '<li>'.$this->Locker->link($k, $v, array('escape'=>false,'class'=>$active_inner)).'</li>';
                                                    $plus .= $this->Locker->link('<li>'.$k.'</li>', $v, array('escape'=>false,'class'=>$active_inner));
                                                }
                                            }

                                            if ($plus !== '') {
                                                echo '<li class="'.$active.'">';
                                                    echo '<a href="#">';
                                                        echo '<i class="metismenu-icon fa fa-angle-right"></i> '.$key;
                                                        echo '<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>';
                                                    echo '</a>';
                                                    echo "<ul>$plus</ul>";
                                                echo '</li>';
                                            }

                                        }else{
                                            foreach ($menu as $k => $v){
                                                if($this->here == $this->Html->url($v)) {
                                                    $active = 'mm-active';
                                                }

                                                if ($k == 'separator' || $v == 'separator') {
                                                    if ($plus != ''){
                                                        $plus .= '';
                                                    }
                                                }else{
                                                    $plus .= '<li class="'.$active.'">'.$this->Locker->link('<i class="metismenu-icon fa fa-angle-right"></i> '.$key, $v, array('escape' => false)).'</li>';
                                                }
                                            }

                                            echo $plus;
                                        }
                                        
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?PHP echo $this->fetch('content'); ?>
                </div>
            </div>

        </div>
    </div>
    
    <div class="bgloader"></div>
</body>
</html>