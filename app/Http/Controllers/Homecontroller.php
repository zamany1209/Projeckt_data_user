<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_s_;
use App\Models\hoghogh;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pagination = 15;
        $data = hoghogh::where('featured' , '=' , '1');
        $data = $data->orderBy('code_mely')->simplePaginate($pagination);
        $data_max_1 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->first();
        $data_max_2 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(1)->first();
        $data_max_3 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(2)->first();
        return view('home',['Data' => $data,'Data_Max_1'=> $data_max_1,'Data_Max_2'=> $data_max_2,'Data_Max_3'=> $data_max_3]);
    }
    public function desc()
    {
        $pagination = 15;
        $data = hoghogh::where('featured' , '=' , '1');
        $data = $data->orderBy('code_mely','desc')->simplePaginate($pagination);
        $data_max_1 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->first();
        $data_max_2 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(1)->first();
        $data_max_3 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(2)->first();
        return view('home',['Data' => $data,'Data_Max_1'=> $data_max_1,'Data_Max_2'=> $data_max_2,'Data_Max_3'=> $data_max_3]);
    }
    public function asc()
    {
        $pagination = 15;
        $data = hoghogh::where('featured' , '=' , '1');
        $data = $data->orderBy('code_mely','asc')->simplePaginate($pagination);
        $data_max_1 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->first();
        $data_max_2 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(1)->first();
        $data_max_3 = hoghogh::where('featured' , '=' , '1')->orderBy('hoghogh', 'DESC')->skip(2)->first();
        return view('home',['Data' => $data,'Data_Max_1'=> $data_max_1,'Data_Max_2'=> $data_max_2,'Data_Max_3'=> $data_max_3]);
    }
    public function search(Request $request)
    {
        $search = $request->Data_search;
        $data = hoghogh::where('code_mely', 'like', '%'.$search.'%')->orderBy('code_mely')->paginate(15);
        return $data;
    }
    public function new_user()
    {
        return view('New_user');
    }

    public function new_user_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'family' => 'required',
            'code_mely' => 'required|min:10|max:10'
        ],[
            'name.required' => 'لطفا نام خود را وارد کنید',
            'family.required' => 'لطفا نام خانوادگی خود را وارد کنید',
            'code_mely.required' => 'لطفا کد ملی خود را وارد کنید',
            'code_mely.max' => 'کد ملی شما بیشتر از حد مجاز است',
            'code_mely.min' => 'کد ملی شما کمتر از حد مجاز است',
        ]);
        $user_database = user_s_::where('code_mely' ,$request->code_mely)->first();
        if(isset($user_database->code_mely) && $request->code_mely == $user_database->code_mely){
            return redirect('new_user');
        }
        else {
            $user = new user_s_;
            $user->name  = $request->name;
            $user->family = $request->family;
            $user->code_mely = $request->code_mely;
            $query = $user->save();
            return redirect('home');
        }
    }
    public function add()
    {
        return view('Add');
    }
    public function add_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'family' => 'required',
            'code_mely' => 'required|min:10|max:10'
        ],[
            'name.required' => 'لطفا نام خود را وارد کنید',
            'family.required' => 'لطفا نام خانوادگی خود را وارد کنید',
            'code_mely.required' => 'لطفا کد ملی خود را وارد کنید',
            'code_mely.max' => 'کد ملی شما بیشتر از حد مجاز است',
            'code_mely.min' => 'کد ملی شما کمتر از حد مجاز است',
        ]);
        $user_database = user_s_::where('code_mely' ,$request->code_mely)->first();
        if(isset($user_database->code_mely) && $request->code_mely == $user_database->code_mely){
            $user = new hoghogh;
            $user->name  = $request->name;
            $user->family = $request->family;
            $user->code_mely = $request->code_mely;
            $user->age = $request->age;
            $user->hoghogh = $request->hoghogh;
            $query = $user->save();
            $user_S = user_s_::where('id', $user_database->id)->update(['hoghogh' => $user_database->hoghogh + 1]);
            return redirect('home');
        }
    }
    public function average(Request $request)
    {
        $pagination = 15;
        $user = user_s_::where('hoghogh' , '>' , '0');
        $user = $user->orderBy('code_mely')->simplePaginate($pagination);
        foreach ($user as $Data_user)
        {
            $Data_average = hoghogh::where('code_mely', $Data_user->code_mely)->avg('hoghogh');
            $object = new \stdClass();
            $object->id = $Data_user->id;
            $object->name = $Data_user->name;
            $object->family = $Data_user->family;
            $object->code_mely = $Data_user->code_mely;
            $object->average = $Data_average;
            $Data[] = $object;
        }
        $Json = $Data;
        return view('Average',['Data' => $Json]);
    }
}
