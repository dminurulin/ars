<?php

namespace App\Http\Controllers\Tools;

use App\Models\Tools\Top10;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;


/**
 * Контроллер раздела исполнителя
 *
 * Class PerformersController
 * @package App\Http\Controllers\Performers
 */
class ToolsController extends Controller
{
    protected $templates = [
        'check-top' => 'tools/top10',
        'register' => 'auth/register'
    ];

    /**
     * метод, возвращающий роуты для данного контроллера
     */
    static function routes()
    {
        $prefix = "/toolstest";
        Route::get($prefix.'/check-top/', 'Tools\ToolsController@checkTop')->name('tools.check-top');
        Route::post($prefix.'/check-top/', 'Tools\ToolsController@checkTopAction')->name('tools.check-top.action');

    }

    public function checkTop(Request $request)
    {
        return view($this->getTemplate('check-top'), [ 'method' => 'get', 'response' => false ]);
    }
    public function checkTopAction(Request $request)
    {
        $keys = $request->get('keys');
        $lr = $request->get('city');
        $deep = $request->get('depth');
        $id = Auth::user()->id;
        $limits_used = Auth::user()->limits_used;
        $limits_total = Auth::user()->limits_total;

        if ($limits_used>=$limits_total) {
            $resp = $this->limitsError();
        } else {
            $this->changeLimits($id, $limits_used + 1);
            $data = [
                'keys' => $keys,
                'lr' => $lr,
                'deep' => $deep
            ];
            $M = new Top10();
            $r = $M->index($data);
            $resp =[
                'keys' => $keys,
                'lr' => $lr,
                'userid' => $id,
                'table' => $r
            ];
        }
        return view($this->getTemplate('check-top'),
            [   'method' => 'post',
                'response' =>$resp
            ]);
    }

    private function limitsError() {
        return [
            'error_code' => -50,
            'error_message' => 'Not enough limits!'
        ];
    }

    private function changeLimits($user_id, $limits=1) {
        $sql = "UPDATE users SET limits_used=$limits WHERE id=$user_id";
        DB::update($sql);
    }
}
