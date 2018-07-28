<?php

namespace App\Http\Controllers\Tools;

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

    }

    public function checkTopAction(Request $request)
    {
        return view($this->getTemplate('check-top'));
    }

}
