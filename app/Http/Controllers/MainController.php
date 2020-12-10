<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category1;
use App\Models\Category2;

class MainController extends Controller
{
    public static function home(Request $request){
        if($request->exists('q')){
            $request->session()->forget('access_token');
        }
        $select=Category1::select('*')->whereNotNull('contents')->orderBy('Id')->get();
        return view('home',['dropdown'=>$select]);
    }
    public static function category(Request $request){
        $q=$request->input('q',DB::table('category1s')->value('contents'));
        $sum=array();
        for($i=1;$i<=13;$i++){
            array_push($sum,'unit'.$i);
        }
        $select=Category1::select('contents')->whereNotNull('contents')->orderBy('Id')->get();
        $select1=Category1::select($sum)->where(['contents'=>$q])->get();
        $select2=Category2::whereIn('units',$select1->toArray()[0])->whereNotNull('units')->orderBy('Id')->get();
        return view('category',['q'=>$q,'iframe1'=>$select,'iframe2'=>$select2]);
    }
    public static function nowlive(){
        return view('nowlive');
    }
    public static function shopcart(){
        return view('shopcart');
    }
    public static function search(){
        return view('search');
    }
    public static function privacy(){
        $read=Storage::disk('public')->get('privacys.txt');
        $date=date('Y年m月d日',Storage::disk('public')->lastModified('privacys.txt'));
        return view('privacy',['read'=>$read,'date'=>$date]);
    }    
}