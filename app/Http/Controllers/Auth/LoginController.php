<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Huoshaotuzi\Sociate\Sociate;

class LoginController extends Controller
{
    /*
    +|--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    protected $redirectTo = '/home';
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static function login(){
        $doname=['qq','baidu','weibo','github'];
        $sum=array();
        array_push($sum,app('sociate')->driver('wechat')->getVerifyUrl(url()->full()));
        for($i=0;$i<count($doname);$i++){
            array_push($sum,app('sociate')->driver($doname[$i])->getLoginUrl(url()->full()));
        }
        return view('login',['fullurl'=>$sum]);
    }
    public static function email(Request $request){
        if($request->exists('q')){
            $request->validate([
                'q'=>'required|email',
            ]);
            $num='';
            for($i=0;$i<6;$i++){
                $num.=dechex(rand(0,15));
            }
            $request->session()->put('number',$num);
            $mail=Mail::to($request->only('q'))->locale('es');
            $mail->send(new OrderShipped($num));
            return null;
        }else{
            $request->validate([
                'username'=>'required|email',
                'captcha'=>'required|alpha_num|size:6',
            ]);
            $user=strstr($request->input('username'),'@',true);
            $num=$request->session()->get('number','***');
            if(strcasecmp($request->input('captcha'),$num)!=0){
                return redirect('/login')->with('alerted',true);
            }
            $request->session()->put('access_token',hash('sha512',$num));
            return view('account',['user'=>$user]);
        }
    }
    public static function socialite($openapi){
        $driver = app('sociate')->driver($openapi);
        $response = $driver->getAccessToken();
        $info = $driver->getUserInfo($response);
        // 如果需要调用到其他接口,此处需要保存 access_token
        dump($response,$info);
        // 此处为逻辑处理:存储用户资料或根据 uid 判断用户是否已绑定账号
        //$user = ...
        // 设置为登录状态
        //Auth::login($user, true);
        // 重定向到登录前页面
        //return redirect(request('state'));
    }
}
