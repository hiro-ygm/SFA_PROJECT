<?php

namespace App\Http\Controllers;

use App\Process;
use App\Calendar;
use App\Customer;
use App\Industory;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CalendarRequest;
use App\Http\Requests\ProcessRequest;


// 「営業プロセス管理」ページの処理をまとめたクラス
//  @author 廣瀬大助(hirohiroygm@gmail.com)
class ProcessController extends Controller
{
    /**
     * インデックスページを表示する
     * @return \Illuminate\Http\Response
     */
     public function index($year = '2019', $month = '07',Request $request){
       $user = Auth::user();
       $dt = Carbon::now();

       // コンタクト履歴のキーワード検索機能
       // 検索窓にキーワードが入力され送信された場合検索を実行する
       if($request->filled('keyword')){
         $keyword = $request->input('keyword');
         //会社名でデータベースを検索する
           $processes = Process::whereHas('customer', function ($query) use ($keyword){
             $query->where('company_name', 'like','%'.$keyword.'%');
           })->get();
         }else{
           //検索窓にキーワードが入力されていない場合はすべてのコンタクト履歴を表示する
           $processes = Process::orderBy('contact_date','desc')->get();
         }

      //疎遠アラート押下時の処理
         //疎遠アラート「注意」押下時の処理
         if($request->filled('alart_yellow')){
           //直近のコンタクトから1か月以上3ヶ月未満の顧客を表示する
             $processes = Process::whereNotBetween('contact_date',[Carbon::now()->subMonth(1),$dt] )
               ->orderBy('contact_date', 'desc')->get();
             }
         //疎遠アラート「警告」押下時の処理
         if($request->filled('alart_red')){
           //直近のコンタクトから3ヶ月以上の顧客を表示する
             $processes = Process::whereNotBetween('contact_date',[Carbon::now()->subMonth(3),$dt] )
               ->orderBy('contact_date', 'desc')->get();
             }


      //コンタクト履歴の並べ替え
      //項目の並べ替えボタンを押したときコンタクト履歴テーブルの各項目の並べ替えをする
          //コンタクト日で並び替える
          if($request->filled('contact_sort_asc')){
            //コンタクトを昇順に並び替え
              $processes = Process::orderBy('contact_date', 'asc' )->get();
              }
          if($request->filled('contact_sort_desc')){
            //コンタクトを昇順に並び替え
              $processes = Process::orderBy('contact_date', 'desc' )->get();
              }

          //面談者名で並べ替え
          if($request->filled('customer_sort_asc')){
            //昇順に並び替え
              $processes = Process::orderBy('customer_id', 'asc' )->get();
              }
          if($request->filled('customer_sort_desc')){
            //降順に並び替え
              $processes = Process::orderBy('customer_id', 'desc' )->get();
              }

          //目的で並べ替え
          if($request->filled('purpose_sort_asc')){
            //昇順に並び替え
              $processes = Process::orderBy('purpose', 'asc' )->get();
              }
          if($request->filled('purpose_sort_desc')){
            //降順に並び替え
              $processes = Process::orderBy('purpose', 'desc' )->get();
              }



       //「未完/完了」ボタンを押した場合コンタクト履歴テーブルの表示を切り替える
       if($request->has('process_doing')){
       //「未完」ボタンを押したとき、close_dateが未入力のデータを表示する
         $processes = Process::whereNull('done')->get();
       }
       if($request->has('process_finished')){
       //「完了」ボタンを押したとき、close_dateが入力されたデータを表示する
         $processes = Process::whereNotNull('done')->get();
       }

       $dates = Calendar::getCalendarDates($year, $month);
       return view('process.index')->with('user',$user)->with('dates',$dates)->with('processes', $processes);
     }

    /**
     * 新規作成画面を表示する
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $industories = Industory::all()->pluck('industory_name', 'id');
      $customers = Customer::all()->pluck('customer_name', 'id');
      $companies = Customer::all()->pluck('company_name', 'id');
      $products = Product::all()->pluck('product_name', 'id');
      //新規作成ページに移動する
      return view('process.create')->with('customers', $customers)
      ->with('companies', $companies)
      ->with('products', $products)
      ->with('industories',$industories);
    }

    /**
     * 「新規作成画面」で作成されたレコードをデータベースに登録する
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessRequest $request)
    {
        //レコードをデータベースに登録する
        $process = new Process;
        $process->contact_date = $request->contact_date;
        $process->purpose = $request->purpose;
        $process->done = $request->done;
        $process->progress_rate = $request->progress_rate;
        // $process->user_id = Auth::id();
        $process->customer_id = $request->customer_id;
        $process->product_id = $request->product_id;
        $process->memo = $request->memo;
        $process->done = $request->done;
        $process->save();
        return redirect()->route('process.index');
    }

    /**
     * テーブルのリンクがクリックされた時、選択されたレコードの詳細画面を表示する
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $process = Process::find($id);
        return view('process.show',['process' => $process]);
    }

    /**
     * 「編集」ボタンが押された時、編集画面を表示する
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $process = Process::find($id);
        $industories = Industory::all()->pluck('industory_name', 'id');
        $customers = Customer::all()->pluck('customer_name', 'id');
        $companies = Customer::all()->pluck('company_name', 'id');
        $products = Product::all()->pluck('product_name', 'id');
        //編集ページに移動する
        return view('process.edit')->with('process',$process)
        ->with('customers', $customers)
        ->with('companies', $companies)
        ->with('products', $products)
        ->with('industories',$industories);
    }

    /**
     * 「編集画面」で編集されたレコードをデータベースに登録する
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessRequest $request,$id)
    {
        //
        $process = Process::find($id);
        $process->contact_date = $request->contact_date;
        $process->purpose = $request->purpose;
        $process->done = $request->done;
        $process->progress_rate = $request->progress_rate;
        // $process->user_id = Auth::id();
        $process->customer_id = $request->customer_id;
        $process->product_id = $request->product_id;
        $process->memo = $request->memo;
        $process->done = $request->done;
        $process->save();
        return redirect()->route('process.show',['id' => $process->id]);
    }

    /**
     * 選択されたレコードをデータベースから削除する
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $process = Process::find($id);
        $process->delete();
        return redirect()->route('process.index');
    }
}
