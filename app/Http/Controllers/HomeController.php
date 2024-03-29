<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\PasswordMail;
use App\Models\Collection;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        $collections = Collection::all();

        return view('pages.index', [
            'collections' => $collections,
        ]);
    }

    public function reg()
    {
        return view('pages.auth.registration');
    }

    public function anons()
    {
        return view('pages.collections.not-predicted-yet');
    }

    public function notPredicted()
    {
        return view('pages.collections.not-predicted-yet');
    }

    public function bared()
    {
        return view('pages.collections.bared');
    }

    public function login(Request $request)
    {
        \Cache::set('redirect-url', $request->header('referer'));

        return view('pages.auth.login');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contact');
    }

    public function success_pay()
    {
        
        if(empty($_COOKIE['myObject'])){
            return redirect("/");
        }

        $cookieValue = $_COOKIE['myObject'];
        $object = json_decode($cookieValue);


        $fullName = $object->name;
        $parts = explode(' ', $fullName, 2);

        $surname = $parts[0];
        $name = $parts[1];

        


        if(!Auth::check()){

            $userCheck = User::where("email", $object->email)->first();

            if($userCheck === null){

                $password = Str::random(12);

                $user = User::query()->create([
                    'password'=>Hash::make($password),
                    "name" => $name,
                    "surname" => $surname,
                    'email' => $object->email,
                    'phone' => $object->phone,
                    'birth_day' => $object->birth_day
                ]);

                Order::where('id', $object->order_id)->update(["user_id" => $user->id]);

                Mail::to($user["email"])->send(new PasswordMail($password, $user['email']));

            }else{

                Order::where('id', $object->order_id)->update(["user_id" => $userCheck->id]);

                Mail::to($object->email)->send(new OrderMail());

            }

        }else{

            Mail::to($object->email)->send(new OrderMail());

        }

        return view('pages.success');
    }
}
