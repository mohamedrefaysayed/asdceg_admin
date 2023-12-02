<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\branches;
use App\categories;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


/*     public function change_locale($locale)
    {
        $language=Language::where('iso',$locale)->first();

        session()->put('locale',$locale);
        session()->put('rtl',$language['rtl']);
        session()->forget('trans');

        return redirect()->back();
    } */
	
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

	

    public function index()
    {


        $data['table_branches'] = branches::orderBy('id','desc')->paginate();
        $data['table_categories'] = categories::orderBy('id','desc')->paginate();
        return view('home',$data);
    }
///


}
