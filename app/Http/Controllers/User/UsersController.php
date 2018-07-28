<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/**
 * Контроллер раздела исполнителя
 *
 * Class PerformersController
 * @package App\Http\Controllers\Performers
 */
class UsersController extends Controller
{
    protected $templates = [
        'main' => 'cabinet/main',
        'login' => 'cabinet/temp',
        'register' => 'auth/register'
    ];

    /**
     * метод, возвращающий роуты для данного контроллера
     */
    static function routes()
    {
            $prefix = "/toolstest";
            Route::get($prefix.'/cabinet/', 'User\UsersController@mainAction')->name('users.main');
            Route::get($prefix.'/cabinet/login', 'User\UsersController@loginAction')->name('users.login');

    }

    public function mainAction(Request $request)
    {
        return view($this->getTemplate('main'));
    }

    public function loginAction(Request $request)
    {
        return view($this->getTemplate('login'));
    }


    public function registerViewAction(Request $request)
    {
        return view($this->getTemplate('register'), [
            //'old' => $request->request->all(),
        ]);
    }

    public function registerNewAction(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|integer|max:10',
            ],
            [
                'required' => 'Атрибут :attribute необходимо задать.',
                'integer' => 'Атрибут :attribute обязательно должно быть целым.',
                'max' => 'Атрибут :attribute должен быть :size.',
            ]
        );

        return redirect()->route('performers.main');
    }
}
