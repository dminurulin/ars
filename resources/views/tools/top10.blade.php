@extends('layouts.cabinet')

@section('content')
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="main_table">
                <ol style="margin-top:20px;" class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/tools/">Инструменты</a></li>
                    <li class="active"></li>
                </ol>
                <div class="page-header" style="text-align:center;">
                    <h1>Выгрузка ТОП-10 сайтов по запросу в ПС Yandex</h1>
                    <div class="form-group">
                        <p>С помощью этого инструмента можно быстро выгрузить топ-10 сайтов по заданным запросам, в поисковой системе Яндекс.</p>
                    </div>
                </div>
                <form METHOD="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="yes" value="1">
                    <div class="fields filter_center clearfix" style="margin: 0 auto;">
                        <div class="form-group clearfix">
                            <label class="col-sm-2 control-label">Ключевые слова:(максимум 50 слов)</label>
                            <div class="col-sm-8">
                                <textarea name="keys" required class="form-control" rows="5" wrap="soft">@if (($method=="post") and (isset($response['keys']))){{ $response['keys'] }}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-2 control-label">Регион:</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm js-example-basic-single" name="city">
                                    <option style="padding: 3px;" value="213">Москва</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-2 control-label">Глубина проверки:</label>
                            <label class="btn btn-default btn-xs" style="padding-left:10px; margin-left: 15px;">
                                <input type="radio" name="depth" id="optionsRadios1" value="10" checked>
                                Топ-10
                            </label>
                            <label class="btn btn-default btn-xs">
                                <input type="radio" name="depth" id="optionsRadios1" value="20" >
                                Топ-20
                            </label>
                            <label class="btn btn-default btn-xs">
                                <input type="radio" name="depth" id="optionsRadios1" value="30" >
                                Топ-30
                            </label>
                            <label class="btn btn-default btn-xs">
                                <input type="radio" name="depth" id="optionsRadios1" value="50" >
                                Топ-50
                            </label>
                            <label class="btn btn-default btn-xs">
                                <input type="radio" name="depth" id="optionsRadios1" value="100" >
                                Топ-100
                            </label>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-sm-2 control-label">Выгрузить в csv:</label>
                            <div class="col-sm-8"><input type="checkbox" (выгружается сразу в файл csv)></div>

                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-success"> Поиск....</button>

                        </div>
                    </div>
            </div>
            </form>

        @if ($response)
            <h1>Результат работы инструмента:</h1>
            {!! $response['table'] !!}<br>
        @endif

        </div>
    </div>
</div>
@endsection
