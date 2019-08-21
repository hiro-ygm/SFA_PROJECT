<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Industory;
use App\Product;
use App\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProjectRequest;

// 「案件管理」ページの処理をまとめたクラス
//  @author 廣瀬大助(hirohiroygm@gmail.com)
class ProjectController extends Controller
{

    /**
     *インデックスページを表示する
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 案件一覧のキーワード検索機能
        // 検索窓にキーワードが入力され送信された場合検索を実行する
          if($request->filled('keyword')){
            $keyword = $request->input('keyword');
            //会社名でデータベースを検索する
              $projects = Project::whereHas('customer', function ($query) use ($keyword){
                $query->where('company_name', 'like','%'.$keyword.'%');
              })->get();
            //検索条件での売上金額の合計
            $total_kingaku = $projects->sum('sales_amount');
            // 件数を取得
            $total_kensu = $projects->count();
          }else{
            //検索窓にキーワードが入力されていない場合はすべての案件を表示する
            $projects = Project::with('customer')->with('product')->with('industory')->get();
            $total_kingaku = Project::sum('sales_amount');
            $total_kensu = Project::all()->count();
          }

          //案件一覧の並べ替え
          //項目の並べ替えボタンを押したときコンタクト履歴テーブルの各項目の並べ替えをする
          //並べ替え
            //案件発生日で並べ替え
            if($request->filled('start_date_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('start_date', 'asc' )->get();
            }
            if($request->filled('start_date_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('start_date', 'desc' )->get();
            }
            //案件名で並べ替え
            if($request->filled('project_name_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('project_name', 'asc' )->get();
            }
            if($request->filled('project_name_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('project_name', 'desc' )->get();
            }
            //会社名で並べ替え
            if($request->filled('customer_id_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('customer_id', 'asc' )->get();
            }
            if($request->filled('customer_id_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('customer_id', 'desc' )->get();
            }
            //業界名で並べ替え
            if($request->filled('industory_id_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('industory_id', 'asc' )->get();
            }
            if($request->filled('industory_id_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('industory_id', 'desc' )->get();
            }
            //売込見込み金額で並べ替え
            if($request->filled('sales_amount_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('sales_amount', 'asc' )->get();
            }
            if($request->filled('sales_amount_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('sales_amount', 'desc' )->get();
            }
            //商品名で並べ替え
            if($request->filled('product_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('product_id', 'asc' )->get();
            }
            if($request->filled('product_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('product_id', 'desc' )->get();
            }
            //進捗率で並べ替え
            if($request->filled('sintyokuritu_sort_asc')){
              //昇順に並び替え
                $projects = Project::orderBy('sintyokuritu', 'asc' )->get();
            }
            if($request->filled('sintyokuritu_sort_desc')){
              //降順に並び替え
                $projects = Project::orderBy('sintyokuritu', 'desc' )->get();
            }

      //「未完/完了」ボタンを押した場合案件一覧テーブルの表示を切り替える
      if($request->has('project_phase_doing')){
      //「未完」ボタンを押したとき、close_dateが未入力のデータを表示する
        $projects = Project::whereNull('close_date')->get();
        $total_kingaku = Project::whereNull('close_date')->get()->sum('sales_amount');
        $total_kensu = Project::whereNull('close_date')->get()->count();
      }
      if($request->has('project_phase_finished')){
      //「完了」ボタンを押したとき、close_dateが入力されたデータを表示する
        $projects = Project::whereNotNull('close_date')->get();
        $total_kingaku = Project::whereNotNull('close_date')->get()->sum('sales_amount');
        $total_kensu = Project::whereNotNull('close_date')->get()->count();
      }
      return view('/project/index',['projects' => $projects, 'total_kingaku' => $total_kingaku,'total_kensu' => $total_kensu]);



}
    /**
     * 新規作成画面を表示する
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $industories = Industory::all()->pluck('industory_name', 'id');
        $customers = Customer::all()->pluck('customer_name', 'id');
        $companies = Customer::all()->pluck('company_name', 'id');
        $products = Product::all()->pluck('product_name', 'id');
        //新規作成ページに移動する
        return view('project.create')
          ->with('industories', $industories)
          ->with('customers', $customers)
          ->with('companies', $companies)
          ->with('products', $products);
    }

    /**
     * 「新規作成画面」で作成されたレコードをデータベースに登録する
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //レコードをデータベースに登録する
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->customer_id  = $request->customer_id;
        $project->industory_id  = $request->industory_id;
        $project->sales_amount  = $request->sales_amount;
        $project->product_id  = $request->product_id;
        $project->start_date  = $request->start_date;
        $project->sintyokuritu  = $request->sintyokuritu;
        $project->close_date  = $request->close_date;
        $project->sales_date  = $request->sales_date;
        $project->created_at  = \Carbon\Carbon::now();
        $project->updated_at  = \Carbon\Carbon::now();
        $project->save();
        return redirect()->route('project.index');
    }

    /**
     *テーブルのリンクがクリックされた時、選択されたレコードの詳細画面を表示する
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $project = Project::find($id);
        return view('project.show',['project' => $project]);
    }

    /**
     * 「編集」ボタンが押された時、編集画面を表示する
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $industories = Industory::all()->pluck('industory_name', 'id');
      $customers = Customer::all()->pluck('customer_name', 'id');
      $products = Product::all()->pluck('product_name', 'id');

        //指定したidの顧客を表示する
        $project = Project::find($id);
        //編集ページに移動する
        return view('project.edit')->with('project', $project)
          ->with('products', $products)
          ->with('customers', $customers)
          ->with('industories', $industories);
    }

    /**
     * 「編集画面」で編集されたレコードをデータベースに登録する
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        //
        $project = Project::find($id);
        $project->project_name = $request->project_name;
        $project->customer_id  = $request->customer_id;
        $project->industory_id  = $request->industory_id;
        $project->sales_amount  = $request->sales_amount;
        $project->product_id  = $request->product_id;
        $project->start_date  = $request->start_date;
        $project->sintyokuritu  = $request->sintyokuritu;
        $project->close_date  = $request->close_date;
        $project->sales_date  = $request->sales_date;
        $project->created_at  = \Carbon\Carbon::now();
        $project->updated_at  = \Carbon\Carbon::now();
        $project->save();
        return redirect()->route('project.show',['id' => $project->id]);
    }

    /**
     * 選択されたレコードをデータベースから削除する
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $project = Project::find($id);
      $project->delete();
      return redirect('project/index');
    }
}
