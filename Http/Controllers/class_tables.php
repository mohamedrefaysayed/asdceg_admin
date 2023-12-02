<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Redirect,Response;
use App\branches;

use App\insert_shift;
use App\users_shifts;
use App\nnnnnnn;
use App\User;
use App\users_permissions;
use App\off;
use App\offrsmy;
use App\employees;
use App\insert_off;
use App\mission;
use App\mission_name;
use App\users_mission_out;
use App\employees_violations;
use App\units;
use DB;
class class_tables extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function swap($locale){
		// available language in template array
		$availLocale=['en'=>'en', 'fr'=>'fr','de'=>'de','ar'=>'ar'];
		// check for existing language
		if(array_key_exists($locale,$availLocale)){
			session()->put('locale',$locale);
		}
		return redirect()->back();
	}

//////////////////تقرير دخول
    public function home()
    {


        $data['table_branches'] = branches::orderBy('id','desc')->paginate();
        return view('pages/home',$data);
    }
///



	
//////////////////units_card
    public function units_card(Request $request)
    {   
	if($request->search == ''){
		$updateDetails = [
		'categories_id' => $request->categorie_id ?? '0',
		//'client_id' => Auth::id()
		];
	}else{
		$updateDetails = [
		'unit_no' => $request->search ?? '0',
		'categories_id' => $request->categorie_id ?? '0',
		//'client_id' => Auth::id()
		];
	}
       $data['table_units'] = units::where($updateDetails)
	   ->orderBy('unit_no', 'asc')
	   ->paginate();

	 
		return view('pages/units_card',$data);
    }
///

//////////////////units_card2
    public function units_card2(Request $request)
    {   
	if($request->search == ''){
		$updateDetails = [
		'categories_id' => $request->categorie_id ?? '0',
		//'client_id' => Auth::id()
		];
	}else{
		$updateDetails = [
		'unit_no' => $request->search ?? '0',
		'categories_id' => $request->categorie_id ?? '0',
		//'client_id' => Auth::id()
		];
	}
       $data['table_units'] = units::where($updateDetails)
	   ->orderBy('unit_no', 'asc')
	   ->paginate();

	 
		return view('pages/units_card2',$data);
    }
///


//////////////////employees
    public function qr_employees(Request $request)
    {   
	if($request->search == ''){
		$updateDetails = [
		'location' => $request->categorie_id ?? '0',
		//'client_id' => Auth::id()
		];
		$data['table_employees'] = employees::where('location', '=', $request->categorie_id ?? '0')
	   ->orderBy('id', 'DESC')
	   ->paginate();
	}else{

		$ssse = $request->search ?? '0';
		$data['table_employees'] = employees::where('location', '=', $request->categorie_id ?? '0')
		->Where('name', 'LIKE', "%{$ssse}%")
	   ->orderBy('id', 'DESC')
	   ->paginate();
	   
	}


	 
		return view('pages/qr_employees',$data);
    }
///

    
   

 
}