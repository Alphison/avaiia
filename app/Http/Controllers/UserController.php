<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\UnisenderRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\UnisenderServiceInterface;
use App\Mail\OrderMail;
use App\Mail\PasswordMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct(
        private UnisenderServiceInterface $unisenderService
    )
    {
    }


    public function setLocale($language){

        $availableLocales = ['ru', 'en'];
        if(!in_array($language, $availableLocales)){
            $language = config('app.locale');
        }

        session(['locale' => $language]);
        App::setLocale($language);

        return redirect()->back();
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }

        if(!Auth::attempt($validator->validated())){
            return back()->withErrors(['invalid' =>'Неверные данные'])->withInput($request->all());
        }

        return \Cache::has('redirect-url')
            ? redirect(\Cache::get('redirect-url'))
            : redirect()->route('page-index');
    }

    public function store(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'surname' => 'required',
        //     'phone' => 'required|min:10',
        //     'email' => 'required|email',
        //     'birth_day' => 'date',
        // ]);

        // if ($validator->fails()){
        //     return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        // }

       

        // Auth::login($user);

        // return \Cache::has('redirect-url')
        //     ? redirect(\Cache::get('redirect-url'))
        //     : redirect()->route('page-index');
    }

    public function show(string $id)
    {
        $user = User::query()->where('id', Auth::user()->id)->first();

        $orders = Order::query()->where('user_id', $id)->get();

        return view('pages.profile', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function setAdmin ($id) {
        User::query()->where('id', '=', $id)->update(['is_admin' => true]);

        return redirect()->back();
    }

    public function update(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email|unique:users,email',
            'birth_day' => 'date',
            'password' => 'required|min:6|regex:/[a-zA-Z]/',
            're_password' => 'same:password',
        ]);

        $validated = $validator->validated();

        $user->update($validated);

        return redirect()->back();
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
