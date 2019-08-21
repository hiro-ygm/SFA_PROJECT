<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnalysisRequest;
use App\Project;
use Carbon\Carbon;
use App\Process;
use App\Goal;

// 「データ分析メニュー」ページの処理
//  @author 廣瀬大助(hirohiroygm@gmail.com)
class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project,Request $request)
    {
      //当月の年月を指定する
      $dt = Carbon::now();
      $thisYear = $dt->year;
      $thisMonth = $dt->month;

      // 年月を指定する
      if($request->year){
        $year = $request->year;
      }else{
        $year = $thisYear;
      }

      //当月の各プロセスの目標値をデータベースから取得する
      $goals = Goal::where('goal_date','like',"{$year}%")->get();

      // 当月のコンタクト数をデータベースから取得する
      $contact_su = Process::whereYear('contact_date', $year)->
                             whereMonth('contact_date', $dt->month)->
                             count();
      // 当月の見積提示数をデータベースから取得する
      $mitsumori_su = Process::where('purpose', '見積提示')->
                               whereYear('contact_date', $year)->
                               whereMonth('contact_date', $dt->month)->
                               count();
      // 当月の案件数をデータベースから取得する
      $anken_su = Project::whereYear('start_date', $year)->
                           whereMonth('start_date', $dt->month)->
                           count();
      // 当月の成約数をデータベースから取得する
      $seiyaku_su = Project::whereYear('sales_date', $year)->
                           whereMonth('sales_date', $dt->month)->
                           count();

     //指定した年月のコンタクト数をデータベースから取得する
     //1月のコンタクト数をデータベースから取得する
     $contact_su_01 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '1')->
                                    count();
     //2月のコンタクト数をデータベースから取得する
     $contact_su_02 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '2')->
                                    count();
     //3月のコンタクト数をデータベースから取得する
     $contact_su_03 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '3')->
                                    count();
     //4月のコンタクト数をデータベースから取得する
     $contact_su_04 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '4')->
                                    count();
     //5月のコンタクト数をデータベースから取得する
     $contact_su_05 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '5')->
                                    count();
     //6月のコンタクト数をデータベースから取得する
     $contact_su_06 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '6')->
                                    count();
     //7月のコンタクト数をデータベースから取得する
     $contact_su_07 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '7')->
                                    count();
     //8月のコンタクト数をデータベースから取得する
     $contact_su_08 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '8')->
                                    count();
     //9月のコンタクト数をデータベースから取得する
     $contact_su_09 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '9')->
                                    count();
     //10月のコンタクト数をデータベースから取得する
     $contact_su_10 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '10')->
                                    count();
     //11月のコンタクト数をデータベースから取得する
     $contact_su_11 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '11')->
                                    count();
     //12月のコンタクト数をデータベースから取得する
     $contact_su_12 = Process::whereYear('contact_date', $year)->
                                    whereMonth('contact_date', '12')->
                                    count();

      //指定した年月の見積提示数を取得する
     //1月の見積提示数をデータベースから取得する
      $mitsumori_su_01 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '1')->
                                     where('purpose','見積提示')->
                                     count();
     //2月の見積提示数をデータベースから取得する
      $mitsumori_su_02 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '2')->
                                     where('purpose','見積提示')->
                                     count();
     //3月の見積提示数をデータベースから取得する
      $mitsumori_su_03 = Process::whereYear('contact_date', $year)->
                                   whereMonth('contact_date', '3')->
                                     where('purpose','見積提示')->
                                     count();
     //4月の見積提示数をデータベースから取得する
      $mitsumori_su_04 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '4')->
                                     where('purpose','見積提示')->
                                     count();
     //5月の見積提示数をデータベースから取得する
      $mitsumori_su_05 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '5')->
                                     where('purpose','見積提示')->
                                     count();
     //6月の見積提示数をデータベースから取得する
      $mitsumori_su_06 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '6')->
                                     where('purpose','見積提示')->
                                     count();
     //7月の見積提示数をデータベースから取得する
      $mitsumori_su_07 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '7')->
                                     where('purpose','見積提示')->
                                     count();
     //8月の見積提示数をデータベースから取得する
      $mitsumori_su_08 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '8')->
                                     where('purpose','見積提示')->
                                     count();
     //9月の見積提示数をデータベースから取得する
      $mitsumori_su_09 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '9')->
                                     where('purpose','見積提示')->
                                     count();
     //10月の見積提示数をデータベースから取得する
      $mitsumori_su_10 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '10')->
                                     where('purpose','見積提示')->
                                     count();
     //11月の見積提示数をデータベースから取得する
      $mitsumori_su_11 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '11')->
                                     where('purpose','見積提示')->
                                     count();
     //12月の見積提示数をデータベースから取得する
      $mitsumori_su_12 = Process::whereYear('contact_date', $year)->
                                     whereMonth('contact_date', '12')->
                                     where('purpose','見積提示')->
                                     count();

      //指定した年月の案件発生数を取得する
     //1月の案件数をデータベースから取得する
      $anken_su_01 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '1')->
                                     count();
     //2月の案件数をデータベースから取得する
      $anken_su_02 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '2')->
                                     count();
     //3月の案件数をデータベースから取得する
      $anken_su_03 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '3')->
                                     count();
     //4月の案件数をデータベースから取得する
      $anken_su_04 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '4')->
                                     count();
     //5月の案件数をデータベースから取得する
      $anken_su_05 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '5')->
                                     count();
     //6月の案件数をデータベースから取得する
      $anken_su_06 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '6')->
                                     count();
     //7月の案件数をデータベースから取得する
      $anken_su_07 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '7')->
                                     count();
     //8月の案件数をデータベースから取得する
      $anken_su_08 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '8')->
                                     count();
     //9月の案件数をデータベースから取得する
      $anken_su_09 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '9')->
                                     count();
     //10月の案件数をデータベースから取得する
      $anken_su_10 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '10')->
                                     count();
     //11月の案件数をデータベースから取得する
      $anken_su_11 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '11')->
                                     count();
     //12月の案件数をデータベースから取得する
      $anken_su_12 = Project::whereYear('created_at', $year)->
                                     whereMonth('created_at', '12')->
                                     count();

      //指定した年月の成約数を取得する
     //1月の成約数をデータベースから取得する
      $seiyaku_su_01 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '1')->
                                     count();
     //2月の成約数をデータベースから取得する
      $seiyaku_su_02 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '2')->
                                     count();
     //3月の成約数をデータベースから取得する
      $seiyaku_su_03 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '3')->
                                     count();
     //4月の成約数をデータベースから取得する
      $seiyaku_su_04 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '4')->
                                     count();
     //5月の成約数をデータベースから取得する
      $seiyaku_su_05 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '5')->
                                     count();
     //6月の成約数をデータベースから取得する
      $seiyaku_su_06 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '6')->
                                     count();
     //7月の成約数をデータベースから取得する
      $seiyaku_su_07 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '7')->
                                     count();
     //8月の成約数をデータベースから取得する
      $seiyaku_su_08 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '8')->
                                     count();
     //9月の成約数をデータベースから取得する
      $seiyaku_su_09 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '9')->
                                     count();
     //10月の成約数をデータベースから取得する
      $seiyaku_su_10 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '10')->
                                     count();
     //11月の成約数をデータベースから取得する
      $seiyaku_su_11 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '11')->
                                     count();
     //12月の成約数をデータベースから取得する
      $seiyaku_su_12 = Project::whereNotNull('sales_date')->
                                     whereYear('created_at', $year)->
                                     whereMonth('created_at', '12')->
                                     count();


      //指定した年月の売上金額を取得する
      //1月の売上金額をデータベースから取得する
      $sales_amount_01 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '1')->
                                     sum('sales_amount');
      //2月の売上金額をデータベースから取得する
      $sales_amount_02 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '2')->
                                     sum('sales_amount');
      //3月の売上金額をデータベースから取得する
      $sales_amount_03 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '3')->
                                     sum('sales_amount');
      //4月の売上金額をデータベースから取得する
      $sales_amount_04 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '4')->
                                     sum('sales_amount');
      //5月の売上金額をデータベースから取得する
      $sales_amount_05 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '5')->
                                     sum('sales_amount');
      //6月の売上金額をデータベースから取得する
      $sales_amount_06 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '6')->
                                     sum('sales_amount');
      //7月の売上金額をデータベースから取得する
      $sales_amount_07 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '7')->
                                     sum('sales_amount');
      //8月の売上金額をデータベースから取得する
      $sales_amount_08 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '8')->
                                     sum('sales_amount');
      //9月の売上金額をデータベースから取得する
      $sales_amount_09 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '9')->
                                     sum('sales_amount');
      //10月の売上金額をデータベースから取得する
      $sales_amount_10 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '10')->
                                     sum('sales_amount');
      //11月の売上金額をデータベースから取得する
      $sales_amount_11 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '11')->
                                     sum('sales_amount');
      //12月の売上金額をデータベースから取得する
      $sales_amount_12 = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '12')->
                                     sum('sales_amount');

      //前年の売上金額をデータベースから取得する
      //前年1月の売上金額をデータベースから取得する
      $sales_amount_01_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '1')->
                                     sum('sales_amount');
      //前年2月の売上金額をデータベースから取得する
      $sales_amount_02_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '2')->
                                     sum('sales_amount');
      //前年3月の売上金額をデータベースから取得する
      $sales_amount_03_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '3')->
                                     sum('sales_amount');
      //前年4月の売上金額をデータベースから取得する
      $sales_amount_04_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '4')->
                                     sum('sales_amount');
      //前年5月の売上金額をデータベースから取得する
      $sales_amount_05_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '5')->
                                     sum('sales_amount');
      //前年6月の売上金額をデータベースから取得する
      $sales_amount_06_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '6')->
                                     sum('sales_amount');
      //前年7月の売上金額をデータベースから取得する
      $sales_amount_07_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '7')->
                                     sum('sales_amount');
      //前年8月の売上金額をデータベースから取得する
      $sales_amount_08_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '8')->
                                     sum('sales_amount');
      //前年9月の売上金額をデータベースから取得する
      $sales_amount_09_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '9')->
                                     sum('sales_amount');
      //前年10月の売上金額をデータベースから取得する
      $sales_amount_10_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '10')->
                                     sum('sales_amount');
      //前年11月の売上金額をデータベースから取得する
      $sales_amount_11_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '11')->
                                     sum('sales_amount');
      //前年12月の売上金額をデータベースから取得する
      $sales_amount_12_n1 = Project::whereYear('updated_at', $year - 1)->
                                     whereMonth('updated_at', '12')->
                                     sum('sales_amount');

      //前々年の売上金額をデータベースから取得する
      //前々年1月の売上金額をデータベースから取得する
      $sales_amount_01_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '1')->
                                     sum('sales_amount');
      //前々年2月の売上金額をデータベースから取得する
      $sales_amount_02_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '2')->
                                     sum('sales_amount');
      //前々年3月の売上金額をデータベースから取得する
      $sales_amount_03_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '3')->
                                     sum('sales_amount');
      //前々年4月の売上金額をデータベースから取得する
      $sales_amount_04_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '4')->
                                     sum('sales_amount');
      //前々年5月の売上金額をデータベースから取得する
      $sales_amount_05_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '5')->
                                     sum('sales_amount');
      //前々年6月の売上金額をデータベースから取得する
      $sales_amount_06_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '6')->
                                     sum('sales_amount');
      //前々年7月の売上金額をデータベースから取得する
      $sales_amount_07_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '7')->
                                     sum('sales_amount');
      //前々年8月の売上金額をデータベースから取得する
      $sales_amount_08_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '8')->
                                     sum('sales_amount');
      //前々年9月の売上金額をデータベースから取得する
      $sales_amount_09_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '9')->
                                     sum('sales_amount');
      //前々年10月の売上金額をデータベースから取得する
      $sales_amount_10_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '10')->
                                     sum('sales_amount');
      //前々年11月の売上金額をデータベースから取得する
      $sales_amount_11_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '11')->
                                     sum('sales_amount');
      //前々年12月の売上金額をデータベースから取得する
      $sales_amount_12_n2 = Project::whereYear('updated_at', $year - 2)->
                                     whereMonth('updated_at', '12')->
                                     sum('sales_amount');

     // 当年の売上金額に対する業界構成比をデータベースから取得する
     //自動車業界の売上金額をデータベースから取得する
     $sales_amount_car = Project::where('industory_id','1')->
                                    whereYear('updated_at', $year)->
                                    whereMonth('updated_at', '1')->
                                    sum('sales_amount');
      //建設業界の売上金額をデータベースから取得する
     $sales_amount_kensetsu = Project::where('industory_id','2')->
                                    whereYear('updated_at', $year)->
                                    whereMonth('updated_at', '1')->
                                    sum('sales_amount');
      //金融業界の売上金額をデータベースから取得する
     $sales_amount_kinyu = Project::where('industory_id','3')->
                                    whereYear('updated_at', $year)->
                                    whereMonth('updated_at', '1')->
                                    sum('sales_amount');
      //当年の合計売上をデータベースから取得する
      $industory_salesAmountData = Project::whereYear('updated_at', $year)->
                                     whereMonth('updated_at', '1')->
                                     sum('sales_amount');

      //各所得データをビューに渡す
      return view('analysis.index')->with('thisYear', $thisYear)
                                   ->with('thisMonth', $thisMonth)
                                   ->with('anken_su', $anken_su)
                                   ->with('contact_su', $contact_su)
                                   ->with('mitsumori_su', $mitsumori_su)
                                   ->with('seiyaku_su', $seiyaku_su)
                                   ->with('year', $year)
                                   ->with('goals', $goals)
                                   ->with('contact_su_01', $contact_su_01)
                                   ->with('contact_su_02', $contact_su_02)
                                   ->with('contact_su_03', $contact_su_03)
                                   ->with('contact_su_04', $contact_su_04)
                                   ->with('contact_su_05', $contact_su_05)
                                   ->with('contact_su_06', $contact_su_06)
                                   ->with('contact_su_07', $contact_su_07)
                                   ->with('contact_su_08', $contact_su_08)
                                   ->with('contact_su_09', $contact_su_09)
                                   ->with('contact_su_10', $contact_su_10)
                                   ->with('contact_su_11', $contact_su_11)
                                   ->with('contact_su_12', $contact_su_12)
                                   ->with('mitsumori_su_01', $mitsumori_su_01)
                                   ->with('mitsumori_su_02', $mitsumori_su_02)
                                   ->with('mitsumori_su_03', $mitsumori_su_03)
                                   ->with('mitsumori_su_04', $mitsumori_su_04)
                                   ->with('mitsumori_su_05', $mitsumori_su_05)
                                   ->with('mitsumori_su_06', $mitsumori_su_06)
                                   ->with('mitsumori_su_07', $mitsumori_su_07)
                                   ->with('mitsumori_su_08', $mitsumori_su_08)
                                   ->with('mitsumori_su_09', $mitsumori_su_09)
                                   ->with('mitsumori_su_10', $mitsumori_su_10)
                                   ->with('mitsumori_su_11', $mitsumori_su_11)
                                   ->with('mitsumori_su_12', $mitsumori_su_12)
                                   ->with('anken_su_01', $anken_su_01)
                                   ->with('anken_su_02', $anken_su_02)
                                   ->with('anken_su_03', $anken_su_03)
                                   ->with('anken_su_04', $anken_su_04)
                                   ->with('anken_su_05', $anken_su_05)
                                   ->with('anken_su_06', $anken_su_06)
                                   ->with('anken_su_07', $anken_su_07)
                                   ->with('anken_su_08', $anken_su_08)
                                   ->with('anken_su_09', $anken_su_09)
                                   ->with('anken_su_10', $anken_su_10)
                                   ->with('anken_su_11', $anken_su_11)
                                   ->with('anken_su_12', $anken_su_12)
                                   ->with('seiyaku_su_01', $seiyaku_su_01)
                                   ->with('seiyaku_su_02', $seiyaku_su_02)
                                   ->with('seiyaku_su_03', $seiyaku_su_03)
                                   ->with('seiyaku_su_04', $seiyaku_su_04)
                                   ->with('seiyaku_su_05', $seiyaku_su_05)
                                   ->with('seiyaku_su_06', $seiyaku_su_06)
                                   ->with('seiyaku_su_07', $seiyaku_su_07)
                                   ->with('seiyaku_su_08', $seiyaku_su_08)
                                   ->with('seiyaku_su_09', $seiyaku_su_09)
                                   ->with('seiyaku_su_10', $seiyaku_su_10)
                                   ->with('seiyaku_su_11', $seiyaku_su_11)
                                   ->with('seiyaku_su_12', $seiyaku_su_12)
                                   ->with('sales_amount_01', $sales_amount_01)
                                   ->with('sales_amount_02', $sales_amount_02)
                                   ->with('sales_amount_03', $sales_amount_03)
                                   ->with('sales_amount_04', $sales_amount_04)
                                   ->with('sales_amount_05', $sales_amount_05)
                                   ->with('sales_amount_06', $sales_amount_06)
                                   ->with('sales_amount_07', $sales_amount_07)
                                   ->with('sales_amount_08', $sales_amount_08)
                                   ->with('sales_amount_09', $sales_amount_09)
                                   ->with('sales_amount_10', $sales_amount_10)
                                   ->with('sales_amount_11', $sales_amount_11)
                                   ->with('sales_amount_12', $sales_amount_12)
                                   ->with('sales_amount_01_n1', $sales_amount_01_n1)
                                   ->with('sales_amount_02_n1', $sales_amount_02_n1)
                                   ->with('sales_amount_03_n1', $sales_amount_03_n1)
                                   ->with('sales_amount_04_n1', $sales_amount_04_n1)
                                   ->with('sales_amount_05_n1', $sales_amount_05_n1)
                                   ->with('sales_amount_06_n1', $sales_amount_06_n1)
                                   ->with('sales_amount_07_n1', $sales_amount_07_n1)
                                   ->with('sales_amount_08_n1', $sales_amount_08_n1)
                                   ->with('sales_amount_09_n1', $sales_amount_09_n1)
                                   ->with('sales_amount_10_n1', $sales_amount_10_n1)
                                   ->with('sales_amount_11_n1', $sales_amount_11_n1)
                                   ->with('sales_amount_12_n1', $sales_amount_12_n1)
                                   ->with('sales_amount_01_n2', $sales_amount_01_n2)
                                   ->with('sales_amount_02_n2', $sales_amount_02_n2)
                                   ->with('sales_amount_03_n2', $sales_amount_03_n2)
                                   ->with('sales_amount_04_n2', $sales_amount_04_n2)
                                   ->with('sales_amount_05_n2', $sales_amount_05_n2)
                                   ->with('sales_amount_06_n2', $sales_amount_06_n2)
                                   ->with('sales_amount_07_n2', $sales_amount_07_n2)
                                   ->with('sales_amount_08_n2', $sales_amount_08_n2)
                                   ->with('sales_amount_09_n2', $sales_amount_09_n2)
                                   ->with('sales_amount_10_n2', $sales_amount_10_n2)
                                   ->with('sales_amount_11_n2', $sales_amount_11_n2)
                                   ->with('sales_amount_12_n2', $sales_amount_12_n2)
                                   ->with('sales_amount_car', $sales_amount_car)
                                   ->with('sales_amount_kensetsu', $sales_amount_kensetsu)
                                   ->with('sales_amount_kinyu', $sales_amount_kinyu)
                                   ->with('industory_salesAmountData', $industory_salesAmountData);

    }

    /**
     * 新規作成画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analysis.create');
    }

    /**
     * 新規作成したレコードをデータベースに登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalysisRequest $request)
    {
        //
        $goal = new Goal();
        $goal->goal_date = $request->goal_date;
        $goal->goal_contact = $request->goal_contact;
        $goal->goal_mitsumori = $request->goal_mitsumori;
        $goal->goal_anken = $request->goal_anken;
        $goal->goal_seiyaku = $request->goal_seiyaku;
        $goal->save();
        return redirect()->route('analysis.show');
    }

    /**
     * 目標値一覧を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $goals = Goal::orderBy('goal_date','desc')->get();
        return view('analysis.show')->with('goals',$goals);
    }

    /**
     * 目標値更新画面を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return view('analysis.edit')->with('goal',$goal);
    }

    /**
     * 更新した目標値をデータベースに登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnalysisRequest $request, $id, Goal $goal)
    {
        //
        $goal = Goal::find($id);
        $goal->goal_date = $request->goal_date;
        $goal->goal_contact = $request->goal_contact;
        $goal->goal_mitsumori = $request->goal_mitsumori;
        $goal->goal_anken = $request->goal_anken;
        $goal->goal_seiyaku = $request->goal_seiyaku;
        $goal->save();
        return redirect()->route('analysis.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
