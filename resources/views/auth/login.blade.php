@extends('layouts.cabinet')

@section('content')
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if (isset(Auth::user()->id))
                    Залогинились!
                @endif
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{{ $error }}}</li>
                        @endforeach
                    </ul>
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
        </div>
    </div>
</div>
@endsection
