<?php

namespace App\Http\Controllers\Tools;

use App\Models\Tools\Top10;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        Route::get($prefix.'/clear-limits/', 'Tools\ToolsController@clearLimits')->name('tools.clear-limits');
        Route::post($prefix.'/check-top/', 'Tools\ToolsController@checkTopAction')->name('tools.check-top.action');

    }

    public function checkTop(Request $request)
    {
        $regions = $this->getRegionList();
        return view($this->getTemplate('check-top'), [
            'method' => 'get',
            'response' => false,
            'regions' => $regions
            ]);
    }

    public function checkTopAction(Request $request)
    {
        $keys = $request->get('keys');
        $lr = $request->get('city');
        $deep = $request->get('depth');
        $csv = $request->get('csv');
        //echo "$csv<br>";
        $regions = $this->getRegionList();
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
            if (!$csv=='on') {
                $r = $M->index($data);
                $resp = [
                    'keys' => $keys,
                    'lr' => $lr,
                    'deep' => $deep,
                    'userid' => $id,
                    'table' => $r
                ];
            } else {
                $str = $M->getInfotoFile($data['keys'], $data['lr'], $deep);
                $filename="Top10".date("Y-m-d_h-I-s")."";
                return $this->getCSVFile($str, $filename,'utf8');
            }
        }
        return view($this->getTemplate('check-top'),
            [   'method' => 'post',
                'response' =>$resp,
                'regions' => $regions
            ]);
    }

    private function limitsError() {
        return [
            'error_code' => -50,
            'error_message' => 'Not enough limits!'
        ];
    }

    private function getCSVFile($string, $filename, $encode = 'windows-1251') {

            $response = new Response();
            $response->headers->set('Content-Type', "text/csv");
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '.csv"');
            $response->headers->set('Content-Transfer-Encoding', "binary");
            $response->headers->set('Content-Length', strlen($string));
            $response->setCharset($encode);
            $response->setContent($string);

            return $response;


    }

    private function changeLimits($user_id, $limits=1) {
        $sql = "UPDATE users SET limits_used=$limits WHERE id=$user_id";
        DB::update($sql);
    }

    public function clearLimits(Request $request) {
        $ip = $request->ip();

        $sql = "UPDATE users SET limits_used=0";
        DB::update($sql);

        return "Лимиты сброшены - $ip";
    }

    private function getRegionList() {
        $sql = "SELECT name, code FROM  sys_dict_locate ORDER by order_number ASC";
        $res = DB::select($sql);
        return $res;
    }
}
