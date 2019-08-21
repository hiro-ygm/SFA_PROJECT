<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CalendarRequest;

// $dt = carbon::now();
// $thisYear = $dt->year;
// $thisMonth = $dt->month;

class CalendarController extends Controller
{
    // $thisYear = (string)date('Y');
    // $thisMonth = (string)date('m');

    public function index($year = '2019', $month = '07', Request $request){
      $user = Auth::user();
      $schedules = Calendar::orderBy('start_date','desc')->get();
      $dates = Calendar::getCalendarDates($year, $month);

      //「未完/完了」ボタンを押した場合
      if($request->has('schedule_phase_doing')){
      //name="project_phase"が"doing"を押したとき、close_dateがnullのデータを表示する
        $schedules = Calendar::whereNull('done')->get();
      }
      if($request->has('project_phase_finished')){
      //name="project_phase"が"doing"を押したとき、close_dateがnullのデータを表示する
        $schedules = Calendar::whereNotNull('done')->get();
      }

      return view('calendar.index3')->with('user',$user)->with('dates',$dates)->with('schedules', $schedules);
    }



    public function create()
    {
        //新規作成ページに移動する
        return view('calendar.create');
    }



    public function show($id){
      $schedule = Calendar::find($id);
      return view('calendar.show',['schedule' => $schedule]);
    }


    public function store(CalendarRequest $request){
      $schedule = new Calendar;
      $schedule->start_date = $request->start_date;
      $schedule->done = $request->done;
      // $schedule->user_id = Auth::id();
      $schedule->title = $request->title;
      $schedule->memo = $request->memo;
      $schedule->save();
      return redirect()->route('calendar.index');
    }

    public function edit($id)
    {
        //指定したidの顧客を表示する
        $schedule = Calendar::find($id);
        //更新ページに移動する
        return view('calendar.edit',['schedule' => $schedule]);
    }

    public function destroy($id){
      $schedule = Calendar::find($id);
      $schedule->delete();
      return redirect()->route('calendar.index');
    }


    public function update(Request $request, $id, Calendar $calendar){
      $schedule = Calendar::find($id);
      $schedule->start_date = $request->start_date;
      $schedule->done = $request->done;
      // $schedule->user_id = Auth::id();
      $schedule->title = $request->title;
      $schedule->memo = $request->memo;
      $schedule->save();
      return redirect()->route('calendar.index');
    }
}
