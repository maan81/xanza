<!-- Top bar start -->
<div class="top-bar">

    <div class="logo">
        Xanza<sup></sup>
    </div>

    <!-- blank for now
        <ul id="icon-nav">
            <li>
                <a href="#">
                    <i class="icon-bell"></i>
                    <span class="count-label"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-comment-alt"></i>
                    <span class="count-label count-lb-yellow"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-envelope-alt"></i>
                    <span class="count-label count-lb-green"></span>
                </a>
            </li>
        </ul>
    Icon nav end -->



</div>
<!-- Top bar end -->

<!-- Header start -->
<header class="navbar" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">&nbsp;</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

        <ul class="nav navbar-nav">
            <li>
                <a href="<?=$config['baseurl']?>">Home</a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Currency Converter <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">

                    <?php foreach($view_data['currencies'] as $key=>$val): ?>
                        <?php foreach($view_data['currencies'] as $kk=>$vv): ?>
                            <?php if($vv==$val) continue;?>
                            <li>
                                <a href="<?=$config['baseurl']?>/convert-<?=strtolower($val)?>-<?=strtolower($vv)?>/1">
                                    <?=$val?> to <?=$vv?>
                                </a>
                            </li>
                        <?php endforeach?>
                    <?php endforeach?>

                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Forex Rates <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">

                    <?php foreach($config['symbols'] as $key=>$val):?>
                        <li>
                            <a href="<?=$config['baseurl']?>/<?=strtolower($val)?>">
                                <?=strtoupper($val)?>
                            </a>
                        </li>
                    <?php endforeach;?>

                </ul>
            </li>

        </ul>

    </nav>
</header>