<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Carbon\carbon;

class MenusController extends Controller
{
    public function index(Request $request)
    {
        if (\Auth::check()){

        $user = \Auth::user();
        //$recipes = $user->get_menu()->get();
        //$today = Carbon::today('Asia/Tokyo');
        //$dow = $today->dayOfWeekIso;
        $monday = new Carbon('monday this week');
        $tuesday = new Carbon('tuesday this week');
        $wednesday = new Carbon('wednesday this week');
        $thursday = new Carbon('thursday this week');
        $friday = new Carbon('friday this week');
        $saturday = new Carbon('saturday this week');
        $sunday = new Carbon('sunday this week');
        $monday_menus = $user->get_menu()->where('YYYYMMDD',$monday)->get();
        $tuesday_menus = $user->get_menu()->where('YYYYMMDD',$tuesday)->get();
        $wednesday_menus = $user->get_menu()->where('YYYYMMDD',$wednesday)->get();
        $thursday_menus = $user->get_menu()->where('YYYYMMDD',$thursday)->get();
        $friday_menus = $user->get_menu()->where('YYYYMMDD',$friday)->get();
        $saturday_menus = $user->get_menu()->where('YYYYMMDD',$saturday)->get();
        $sunday_menus = $user->get_menu()->where('YYYYMMDD',$sunday)->get();
        
        $data = [
            'user' => $user,
            //'recipes' => $recipes,
            'monday' => $monday,
        	'tuesday' => $tuesday,
        	'wednesday' => $wednesday,
        	'thursday' => $thursday,
        	'friday' => $friday,
        	'saturday' => $saturday,
        	'sunday' => $sunday,
        	'monday_menus' => $monday_menus,
        	'tuesday_menus' => $tuesday_menus,
        	'wednesday_menus' => $wednesday_menus,
        	'thursday_menus' => $thursday_menus,
        	'friday_menus' => $friday_menus,
        	'saturday_menus' => $saturday_menus,
        	'sunday_menus' => $sunday_menus
        	//'dow' => $dow
        ];
        
        return view('menus.index', $data);
        }else{
            return redirect("/");
        }
    }
    
    public function store(Request $request,$id)
    {
        $date = $request->date;//フォームに入力された日付を取得
        $replace = [
            // '置換前の文字' => '置換後の文字',
            '年' => '-',
            '月' => '-',
            '日' => '-',
        ];
        $date = strtr($date, $replace);
        
        \Auth::user()->associate_with_menu($id,$date);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unassociate_with_menu($id);
        return back();
    }
}
