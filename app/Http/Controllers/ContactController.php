<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
// use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\JapanPostcode;

use function PHPUnit\Framework\isNull;

class ContactController extends Controller
{
    // 初期表示
    public function index(Request $request)
    {
        return view('contact',[
            'title' => 'お問い合わせ',
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ]);
    }

    // 入力チェック
    // public function check(Request $request){
    //     $rules= new ContactRequest;
    //     $this->validate($request, $rules->rules());
    //     return view('contact', [
    //         'title' => 'お問い合わせ',
    //         'firstname' => $request->input('firstname'),
    //         'lastname' => $request->input('lastname'),
    //         'fullname' => $request->input('fullname'),
    //         'gender' => $request->input('gender'),
    //         'email' => $request->input('email'),
    //         'postcode' => $request->input('postcode'),
    //         'address' =>  $request->input('address'),
    //         'building_name' => $request->input('building_name'),
    //         'opinion' => $request->input('opinion'),
    //     ])->withErrors->withMessages;
    // }

    // 郵便番号 >>> 住所 検索
    public function postcode(Request $request){
        $item=JapanPostcode::where('postcode', 'LIKE', '%' . $request->input('postcode') . '%')->first();
        $str = substr($request->postcode, 0,3).'-'. substr($request->postcode, 3);
        $address= optional($item)->prefecture . optional($item)->city . optional($item)->address;
        // if(is_Null($address)){
        //     $address='該当住所がありません。';
        // }
        return view('contact', [
            'title' => 'お問い合わせ',
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'postcode' => $str,
            'address' =>  $address,
            'building_name' => $request->input('building_name'),
            'opinion' => $request->input('opinion'),
        ]);
    }

    // 確認処理
    public function confirm(ContactRequest $request){
        if ($request->input('confirm') !== 'confirm') {
            return redirect('/contact')->withInput();
        };
        return view('confirm', [
            'title' => '内容確認',
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ]);
        // return redirect('contact/confirm')->withInput();
    }

    // 完了処理
    public function complete(Request $request){
        if ($request->input('back') == 'back') {
            return redirect('/contact')->withInput();
        };
        Contact::create([
            'fullname' => $request->firstname.' '.$request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ]);
        return view('complete',['title'=>'送信完了']);
    }
}
