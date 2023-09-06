<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }

    public function testResult(Content $content)
    {
        // dd('view test');

        // userNewAPI
        $response = Http::post('http://34.100.197.14/statistics/user/new/hourly',[
            'id'=>'NBS',
            'date'=>date('Y-m-d'),
        ]);
        // dd($response);

        // 將API回傳值轉為json array
        $jsonUserNew = $response->json();
        dd($jsonUserNew);

        $content->title('testResult');
        $content->description('date: '.date('Y-m-d'));

        return $content;
    }
}
