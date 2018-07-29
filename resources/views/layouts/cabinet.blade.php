<!DOCTYPE html>
<html lang="ru"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Инструменты для SEO-специалиста  - arsenkin.RU</title>
    <meta name="description" content="Полезные инструменты для SEO специалистов и интернет-маркетологов: парсинг подсветок Яндекса, проверка фильтра переоптимизация и многое другое." />
    <meta name="author" content="">
    <meta name="robots" content="index, follow"/>
    <!-- <link rel="canonical" href="http://arsenkin.ru/tools/"/> -->

    <!-- Le styles -->
    <script src="/skin/js/jquery.js"></script>
    <link href="/skin/css/style.css" rel="stylesheet">
    <link href="/skin/css/b3/bootstrap.css" rel="stylesheet">
    <link href="/skin/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
        .flat-table {
            padding: 10px 10px 10px 10px;
        }
        .form-flat {
            padding: 10px 1px 1px 10px;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
</head>

<body contenteditable="false">
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-43785092-1', 'arsenkin.ru');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

</script>
<!-- Menu -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="/tools/"><i class="fa fa-home"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tasks"></i> Все SEO-инструменты <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li ><a href="/tools/sp/">1. Парсинг подсветок</a></li>
                            <li ><a href="/toolstest/check-top">2. Выгрузка ТОП-10</a></li>
                            <li ><a href="/tools/filter/">3. Переоптимизация</a></li>
                            <li ><a href="/tools/check-mobile/">4. Mobile-Friendly</a></li>
                            <li ><a href="/tools/check-h/">5. Теги H1-H6</a></li>
                            <li ><a href="/tools/visualred/">6. HTML редактор</a></li>
                            <li ><a href="/tools/lemma/">7. Лемматизатор</a></li>
                            <li ><a href="/tools/bookmarklet/">8. Букмарклеты</a></li>
                            <li><a href="/tools/check-classified/">9. Check Classified</a></li>
                            <li><a href="/tools/affiliat/">10. Сниппеты и Adult</a></li>
                        </ul>
                    </li>
                </ul>
                @if (isset(Auth::user()->id))
                <div class="col-md-6" style="color: white;padding: 16px;">
                    Cуточный лимит на аккаунт: {{ Auth::user()->limits_total  }},
                    Использовано: {{ Auth::user()->limits_used	 }} ( <a href="#">Увеличить лимит</a> )

                </div>

                <ul id="w3" class="navbar-nav navbar-right nav" style="padding-right:20px;">
                    <li><a href="/tools/hservice/" target="_blank"><i class="fa fa-usd"></i> Donate</a></li>
                    <li><a href="{{ route('users.main') }}"><i class="fa fa-user"></i> Профиль ({{ Auth::user()->name	 }})</a></li>
                    <li><a href="{{ route('logout') }}" data-method="post">[<i class="fa fa-sign-out"></i> Выход</a></li>

                </ul>
                @else
                <ul id="w3" class="navbar-nav navbar-right nav" style="padding-right:20px;">
                    <li><a href="{{route('auth.login')}}">Вход</a></li>
                    <li><a href="{{route('auth.register')}}" data-method="post">Регистрация</a></li>
                @endif
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- container -->
<div class="main-container" style="box-shadow: 0px 0px 46px 0px #DDD;">
    <div class="container-fluid">
        <div class="row-fluid">

            @yield('content')


        </div>

    </div>

            <?php #include("/usr/local/www/arsenkin.ru/tools/include/footer.php"); ?>


            <script src="/skin/js/js.js"></script>
            <script src="/skin/js/b3/bootstrap.js"></script>
            <script src="/skin/js/bootstrap-tooltip.js"></script>

</body></html>



