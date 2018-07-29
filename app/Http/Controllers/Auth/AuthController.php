<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Code;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CodeController;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/toolstest';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function activate(Request $request)
    {
        $res = Code::where('user_id',$request->id)
            ->where('code',$request->code)
            ->first();
        if($res) {
            //Удаляем использованный код
            $res->delete();
            //активируем аккаунт пользователя
            User::find($request->id)
                ->update([
                    'activated'=>1,
                ]);
            //редиректим на страницу авторизации с сообщением об активации
            return redirect()->to('/toolstest/cabinet')->with(['message' => 'ok']);
        }
        return abort(404);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        };
        $user = $this->create($request->all());
        //создаем код и записываем код
        $code = CodeController::generateCode(8);
        Code::create([
            'user_id' => $user->id,
            'code' => $code,
        ]);
        //Генерируем ссылку и отправляем письмо на указанный адрес
        $url = 'https://arsenkin.ru/toolstest/auth/activate?id='.$user->id.'&code='.$code;
        Mail::send('emails/registration', array('url' => $url), function($message) use ($request)
        {
            $message->to($request->email)->subject('Registration on Arsenkin.ru')->from("robot@arsenkin.ru");
        });

        return 'Регистрация прошла успешно, на Ваш email отправлено письмо со ссылкой для активации аккаунта';
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
