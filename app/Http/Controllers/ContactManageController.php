<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Carbon\Carbon;

class ContactManageController extends Controller
{
    // 初期表示
    public function index(Request $request){
        $items = Contact::Paginate(10);
        return view('contactmanage', [
            'items' => $items,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'created_at1' => $request->created_at1,
            'created_at2' => $request->created_at2,
        ]);
    }

    // 検索処理
    public function search(Request $request){
        //リセットボタン　リダイレクト
        if ($request->input('search_rst') == 'search_rst') {
            return redirect('/contactmanage');
        };
        //日付チェック
        if ($request->filled('created_at1')) {
            $date1=$request->created_at1;
            //日付1:有効 and 日付2:有効
            if($request->filled('created_at2')) {
                $date2=$request-> created_at2;
                //日付2<日付1のとき入れ替え
                if($date1> $date2){
                    $date1=$request->created_at2;
                    $date2 = $request->created_at1;
                }
            //日付1:有効 and 日付2:無効
            }else {
                $date2 = Carbon::maxValue();
            }
        //日付1:無効 and 日付2:有効
        } elseif ($request->filled('created_at2')) {
            // $date1 = new Carbon('1900-01-01 00:00:00');
            $date1 = Carbon::minValue();
            $date2 = $request->created_at2;
        //日付1:無効 and 日付2:無効
        }else {
            // $date1 = new Carbon('1900-01-01 00:00:00');
            $date1 = Carbon::minValue();
            $date2 = Carbon::maxValue();
        }

        // 検索
        switch ($request->gender){
            case 0://全て
                $items = Contact::where('fullname', 'LIKE', '%' . $request->fullname . '%')->whereIn('gender', [1, 2])->where('email', 'LIKE', '%' . $request->email . '%')->whereBetween("created_at", [$date1, $date2])->Paginate(10);
                break;
            case 1://男性のみ
                $items = Contact::where('fullname', 'LIKE', '%' . $request->fullname . '%')->where('gender', '1')->where('email', 'LIKE', '%' . $request->email . '%')->whereBetween("created_at", [$date1, $date2])->Paginate(10);
                break;
            case 2://女性のみ
                $items = Contact::where('fullname', 'LIKE', '%' . $request->fullname . '%')->where('gender', '2')->where('email', 'LIKE', '%' . $request->email . '%')->whereBetween("created_at", [$date1, $date2])->Paginate(10);
                break;
        }
        // 結果表示
        return view('contactmanage', [
            'items' => $items,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'created_at1' => $date1,
            'created_at2' => $date2,
        ]);

    }

    // 削除処理
    public function destory(Request $request){
        Contact::find($request->delete_btn)->delete();
        return redirect('/contactmanage');
    }

}
