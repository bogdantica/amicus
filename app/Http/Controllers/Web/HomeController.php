<?php

namespace App\Http\Controllers\Web;


use App\Amicus\Views\PageView;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $d = PageView::home();

        return view('home',compact('d'));
    }
}
