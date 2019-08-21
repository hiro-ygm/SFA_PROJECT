<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Industory;
use App\User;
use Illuminate\Support\Facades\DB;

// 「顧客管理」ページの処理
//  @author 廣瀬大助(hirohiroygm@gmail.com)
class CustomerController extends Controller
{
    /**
     * 顧客管理ページの表示
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    public function index(Request $request)
    {

// 個人名、メールアドレス、部署名の検索
        if($request->filled('keyword')) {
          $keyword = $request->input('keyword');
          $customers = Customer::where(DB::raw('CONCAT(customer_name,email,department,company_name)'), 'like', '%' . $keyword . '%')->get();
        } else {
          $customers = Customer::all();
        }
          return view('customer/index',['customers' => $customers]);
    }

    /**
     * 新規作成画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industories = Industory::all()->pluck('industory_name', 'id');
        //新規作成ページに移動する
        return view('customer.create')->with('industories', $industories);
    }

    /**
     * 作成した顧客レコードをデータベースに登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        //入力されたデータをデータベースの項目に入れる
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->mobile_telno  = $request->mobile_telno;
        $customer->company_name  = $request->company_name;
        $customer->department  = $request->department;
        $customer->rank  = $request->rank;
        $customer->industory_id  = $request->industory_id;

        // $this->validate($request,$rules);
        if ($request->file('image_url')){
          $filename = $request->file('image_url')->store('public');
          $customer->image_url = basename($filename);
        }
          $customer->save();
          return redirect()->route('customer.show',['id' => $customer->id]);

    }

    /**
     * 顧客詳細画面を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //指定したidの顧客を表示する
          $customer = Customer::find($id);
          return view('customer.show',['customer' => $customer]);
    }

    /**
     * 顧客更新画面を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //指定したidの顧客を表示する
        $customer = Customer::find($id);
        //業界データを取得
        $industories = Industory::all()->pluck('industory_name', 'id');
        //新規作成ページに移動する
        return view('customer.edit')->with('customer', $customer)
          ->with('industories', $industories);
    }

    /**
     * 更新したレコードをデータベースに登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id, Customer $customer)
    {
        //
        $customer = Customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->email  = $request->email;
        $customer->mobile_telno  = $request->mobile_telno;
        $customer->company_name  = $request->company_name;
        $customer->department  = $request->department;
        $customer->rank  = $request->rank;
        $customer->industory_id  = $request->industory_id;

        if ($request->file('image_url')){
          $filename = $request->file('image_url')->store('public');
          $customer->image_url = basename($filename);
        }
          $customer->save();
          return redirect()->route('customer.show',['id' => $customer->id]);
    }

    /**
     * 顧客レコードを削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('customer/index');
    }

}
