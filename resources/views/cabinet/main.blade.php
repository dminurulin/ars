@extends('layouts.cabinet')

@section('content')
    <br>
<div class="container">
    <div class="row">
        <ol style="margin-top:0px;" class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="/tools/">Инструменты</a></li>
            <li><a href="/tools/cabinet/">Личный кабинет</a></li>
            <li class="active"></li>
        </ol>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if (isset(Auth::user()->id))
                    <div class="panel-body">
                    <p>
                    Добропожаловать {{ Auth::user()->name  }}
                    <p>
                    Email : {{ Auth::user()->email  }}
                <p>
                Лимитов всего:{{ Auth::user()->limits_total  }}
                <p>
                Лимитов потрачено:{{ Auth::user()->limits_used	 }}

                    <p>
                        <a href="{{ route('logout') }}">Выход</a>
                    </div>
                @else

                    <div class="panel-heading">Вход</div>

                    <div class="panel-body">

                            <form method="POST" action="https://arsenkin.ru/toolstest/auth/login">
                                {{ csrf_field() }}
                                <table class="flat-table">
                                    <tr>
                                        <td class="form-flat">Логин(Email):</td><td class="form-flat"> <input type="text" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td class="form-flat">Пароль: </td><td class="form-flat"><input type="password" name="password"></td>
                                    </tr>
                                    <tr>
                                        <td class="form-flat" style="align-items: right">

                                        <input type="submit" value="Войти">
                                        </td>
                                    </tr>
                                </table>
                            </form>


                    </div>

                @endif


            </div>
        </div>
    </div>
</div>
@endsection
