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
                <?php include("/usr/local/www/arsenkin.ru/tools/include/menu.php"); ?>
            </div>
        </div>
    </div>
</div>
<!-- container -->
<div class="main-container" style="box-shadow: 0px 0px 46px 0px #DDD;">
    <div class="container-fluid">
        <div class="row-fluid">

            <ol style="margin-top:20px;" class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active"></li>
            </ol>
            <div class="main_table">

                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                        Залогиненлись!
                        @else

                            <a href="{{ route('auth.register')}}">Регистрация</a>

                    </div>
                @endif


                <div class="page-header" style="text-align:center;">
                    <h1>&#10004; Инструменты SEO-специалиста</h1>

                    <?php include("/usr/local/www/arsenkin.ru/tools/include/messages.php"); ?>

                </div>

                <div class="highlight check_filter">
                    <h4>1. <a href="/tools/sp/">Парсинг подсветок Яндекса</a> - <small>Инструмент, который поможет по запросу спарсить подсветки (выделенные жирным) поисковой системы Яндекс.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>2. <a href="/tools/filter/">Проверка фильтра Переоптимизация</a> - <small>Инструмент, который поможет быстро проверить документ на <a class="pageNoFollow_hilite" rel="nofollow" href="http://webmaster.ya.ru/replies.xml?item_no=11464" target="_blank">текстовый фильтр Переоптимизация</a>. </small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>3. <a href="/tools/check-top/">Выгрузка ТОП-10 сайтов</a> - <small>Инструмент, который поможет быстро выгрузить топ-10 сайтов по заданным запросам, в поисковой системе Яндекс.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>4. <a href="/tools/affiliat/">Аффилиат и одинаковые сниппеты</a> - <small>Инструмент, который поможет быстро проверить фильтр на одинаковые сниппеты и аффилированность сайта.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>5. <a href="/tools/minusinsk/">Проверка фильтра Минусинск</a> - <small>Инструмент, который поможет быстро проверить Ваш сайт на фильтр Минусинск Яндекса.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>6. <a href="/tools/visualred/">Визуальный HTML редактор</a> - <small>Инструмент, который поможет быстро сверстать текст и разместить на сайте.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>7. <a href="/tools/check-h/">Парсинг тегов H1-H6</a> - <small>Инструмент, который поможет быстро собрать теги H1-H6 по конкурентам из выдачи Яндекса по заданному вами запросу.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>8. <a href="/tools/lemma/">Лемматизатор</a> - <small>С помощью инструмента можно быстро лемматизировать текст (приводит к именительному падежу единственному числу) и проверять на N-граммы в тексте.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>9. <a href="/tools/bookmarklet/">Сборник букмарклетов</a> - <small>Большой список букмарклетов для SEO-специалистов.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>10. <a href="/tools/check-classified/">Проверка запросов на наличие ТОПовых Classified</a> - <small>Инструмент, который быстро соберет информацию по запросу наличие в топе-10 или топ-15 агрегаторов и сайтов E-commerce.</small></h4>
                </div>

                <div class="highlight check_filter">
                    <h4>11. <a rel="nofollow" href="http://text.ru/seo/" target="_blank">SEO-анализ текста</a> - <small>Сторонний инструмент, с возможностью подсветки «воды», заспамленности и ключей в тексте позволяет сделать анализ текста интерактивным и легким для восприятия.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>12. <a rel="nofollow" href="https://metrika.yandex.ru/" target="_blank">Яндекс.Метрика</a> &amp; <a rel="nofollow" href="https://www.google.com/analytics/" target="_blank">Google Analytics</a> - <small> Сторонние инструменты, для наблюдения за ключевыми показателями эффективности сайта, анализа поведения посетителей, оценки отдачи от рекламных кампаний.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>13. <a rel="nofollow" href="https://webmaster.yandex.ru" target="_blank">Яндекс.Вебмастер</a> &amp; <a rel="nofollow" href="http://www.google.ru/webmasters/" target="_blank">Google Webmasters</a> - <small> Сторонние инструменты, предоставляющие информацию о том, как индексируются ваши сайты. Они позволяют сообщить о новых и удаленных страницах, настроить индексирование сайта и улучшить представление сайта в результатах поиска.</small></h4>
                </div>
                <div class="highlight check_filter">
                    <h4>14. <a rel="nofollow" href="https://sitechecker.pro/ru/" target="_blank">SiteChecker.PRO</a> - <small> Сторонний бесплатный сервис для онлайн анализа внутренней SEO оптимизации сайта. Инструмент показывает основные SEO ошибки и детальные рекомендации по их устранению. </small></h4>

                </div>
                <!--<script>
                document.write('Тестовая строка №1 c2ecab8c7fda11ee20300209aca5b1f5');
                </script>
                <br><span class='test-span'></span>
                <script>
                 $("span.test-span").text("Тестовая строка № 2 b01ea121caf13fea81d4969904816bfa");
                </script>
                <script>
                document.write('<br>Тестовая ссылка №1 <a href="/tools/sp/">подсветочки</a><br>Тестовая ссылка №2 <a href="/tools/sp/">2312d3d57a97d4cfc4faa9671fd77c68</a>');
                </script>
                <p>
                    Тестовая ссылка №3 <a href="/tools/sp/">сбор подсветочек</a><br>
                    Тестовая ссылка №3.5 <a href="/tools/sp/">супер пупер подсветочки Яндекса</a><br>
                    Тестовая ссылка №4 <a href="/tools/sp/">ad716db6bb4ec8c53135c7bb51245497</a>
                </p>-->

                <div style="text-align:center; padding-top:20px;">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Инструменты-2 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-0323954385305811"
                         data-ad-slot="4720322184"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>

                <?php #include("/usr/local/www/arsenkin.ru/tools/include/footer.php"); ?>


                <script src="/skin/js/js.js"></script>
                <script src="/skin/js/b3/bootstrap.js"></script>
                <script src="/skin/js/bootstrap-tooltip.js"></script>

</body></html>