@extends('layouts.layout')
@section('title','データ分析')
@section('content')
<div class="analysis_container mr-1 ml-1">

  <h1 class="page_title float-left">データ分析メニュー</h1>
  {{ Form::open(['method' => 'get']) }}
  {{ Form::selectRange('year','2017','2019',$year,['class' => 'form-control float-left','style' => 'width:100px;'])}}
  {{ Form::label('year','年度',['class' => 'input-group-text float-left','style' => 'width:80px;']) }}
  {{ Form::submit('表示', ['class' => 'btn btn-info float-left']) }}
  {{ Form::close() }}
  <div class="clear"></div>
  <a href="{{ route('analysis.show')}}" class="ml-3">目標設定</a>
  <!-- <div class="btn-group float-left ml-3" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">個人</button>
    <button type="button" class="btn btn-secondary">全体</button>
  </div> -->
  <!-- <div class="btn-group float-left ml-3" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">月間</button>
    <button type="button" class="btn btn-secondary">年間</button>
  </div> -->

  <!-- <h6>行動分析</h6> -->
  <!-- プロセス分析 -->
  <div class="row m-0">
    <!-- コンタクト数 -->
    <div class="col-md-3 analysis_item p-1">
        <button type="button" name="button" class="btn btn-sm btn-danger">コンタクト数</button>
        <button type="button" name="button" class="btn btn-sm btn-dark">　　{{ $contact_su }}件　　</button>
        <div class="input-group float-right">
          {{ Form::label('goal_contact','目標値:',['class' => 'input-group-text'])}}
          @foreach($goals as $goal)
          <a href="#" class="form-control">{{ $goal->goal_contact }}</a>
          @endforeach
        </div>
        <div class="clear"></div>
        <div class="tasseiritu">

          <!-- <p style="font-size:100px;" class="text-center">60%</p> -->
          <canvas id="process1" style="width: 100%; height: 300px;"></canvas>
        </div>
    </div>

    <!-- 見積提出数 -->
    <div class="col-md-3 analysis_item p-1">
      <button type="button" name="button" class="btn btn-sm btn-warning">見積提示数</button>
      <button type="button" name="button" class="btn btn-sm btn-dark">　　{{ $mitsumori_su }}件　　</button>
      <div class="input-group float-right">
        {{ Form::label('goal_mitsumori','目標値:',['class' => 'input-group-text'])}}
        @foreach($goals as $goal)
        <a href="#" class="form-control">{{ $goal->goal_mitsumori }}</a>
        @endforeach
      </div>
        <div class="clear"></div>
        <div class="tasseiritu">

          <canvas id="process2" style="width: 100%; height: 300px;"></canvas>
        </div>
    </div>

    <!-- 案件発生数 -->
    <div class="col-md-3 analysis_item p-1">
      <button type="button" name="button" class="btn btn-sm btn-success">案件発生数</button>
      <button type="button" name="button" class="btn btn-sm btn-dark">　　{{ $anken_su }}件　　</button>
      <div class="input-group float-right">
        {{ Form::label('goal_anken','目標値:',['class' => 'input-group-text'])}}
        @foreach($goals as $goal)
        <a href="#" class="form-control">{{ $goal->goal_anken }}</a>
        @endforeach
      </div>
        <div class="clear"></div>
        <div class="tasseiritu">
          <canvas id="process3" style="width: 100%; height: 300px;"></canvas>
        </div>
    </div>

    <!-- 成約件数 -->
    <div class="col-md-3 analysis_item p-1">
      <button type="button" name="button" class="btn btn-sm btn-primary">成約件数</button>
      <button type="button" name="button" class="btn btn-sm btn-dark">　　{{ $seiyaku_su }}件　　</button>
      <div class="input-group float-right">
        {{ Form::label('goal_seiyaku','目標値:',['class' => 'input-group-text'])}}
        @foreach($goals as $goal)
        <a href="#" class="form-control">{{ $goal->goal_seiyaku }}</a>
        @endforeach
      </div>
          <div class="clear"></div>
          <div class="tasseiritu">
            <canvas id="process4" style="width: 100%; height: 300px;"></canvas>
          </div>
    </div>
  </div>

  <!-- 売上分析 -->
  <!-- <h6>売上分析</h6> -->
  <div class="row m-0">
    <div class="col-md-8 analysis_item p-1">
      <h6>売上推移</h6>
      <!-- <ul>
        <li>過去3年分</li>
      </ul> -->
      <canvas id="sales" style="width: 100%; height: 300px;"></canvas>
    </div>
    <div class="col-md-4 analysis_item p-1">
      <h6>構成比</h6>
      <!-- <ul>
        <li>業界別</li>
        <li>顧客別</li>
      </ul> -->
      <canvas id="share" class="mt-5"></canvas>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script>


//各種グラフ
// コンタクト数
var ctx = document.getElementById("process1").getContext('2d');
var process1 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['4月','5月','6月','7月','8月','9月','10月','11月','12月','1月','2月','3月'],
      datasets: [{
        label: 'コンタクト数',
        data: [
                {{ $contact_su_04}},
                {{ $contact_su_05}},
                {{ $contact_su_06}},
                {{ $contact_su_07}},
                {{ $contact_su_08}},
                {{ $contact_su_09}},
                {{ $contact_su_10}},
                {{ $contact_su_11}},
                {{ $contact_su_12}},
                {{ $contact_su_01}},
                {{ $contact_su_02}},
                {{ $contact_su_03}},
        ],
      },{
        label: '達成率',
        type: 'line',
        fill: false,
        lineTension: 0,
        @foreach($goals as $goal)
        data: [
                  {{ $contact_su_04 / $goal->goal_contact * 100  }},
                  {{  $contact_su_05 / $goal->goal_contact * 100  }},
                  {{  $contact_su_06 / $goal->goal_contact * 100  }},
                  {{  $contact_su_07 / $goal->goal_contact * 100  }},
                  {{  $contact_su_08 / $goal->goal_contact * 100  }},
                  {{  $contact_su_09 / $goal->goal_contact * 100  }},
                  {{  $contact_su_10 / $goal->goal_contact * 100  }},
                  {{  $contact_su_11 / $goal->goal_contact * 100  }},
                  {{  $contact_su_12 / $goal->goal_contact * 100  }},
                  {{  $contact_su_01 / $goal->goal_contact * 100  }},
                  {{  $contact_su_02 / $goal->goal_contact * 100  }},
                  {{  $contact_su_03 / $goal->goal_contact * 100  }},
              ],
        @endforeach
        borderColor: "rgb(154, 162, 235)",
        yAxisID: "y-axis-1",
      }]
    },
    options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 140,
                            min: 0,
                            stepSize: 10
                        },
                  }],
                },
            }
});

//見積提出数
var ctx = document.getElementById("process2").getContext('2d');
var process2 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['4月','5月','6月','7月','8月','9月','10月','11月','12月','1月','2月','3月'],
      datasets: [{
        label: '見積提示数',
        data: [
          {{ $mitsumori_su_04 }},
          {{ $mitsumori_su_05 }},
          {{ $mitsumori_su_06 }},
          {{ $mitsumori_su_07 }},
          {{ $mitsumori_su_08 }},
          {{ $mitsumori_su_09 }},
          {{ $mitsumori_su_10 }},
          {{ $mitsumori_su_11 }},
          {{ $mitsumori_su_12 }},
          {{ $mitsumori_su_01 }},
          {{ $mitsumori_su_02 }},
          {{ $mitsumori_su_03 }},
        ],
      },{
        label: '達成率',
        type: 'line',
        fill: false,
        lineTension: 0,
        @foreach($goals as $goal)
        data: [
                  {{  $mitsumori_su_04 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_05 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_06 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_07 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_08 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_09 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_10 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_11 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_12 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_01 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_02 / $goal->goal_mitsumori * 100  }},
                  {{  $mitsumori_su_03 / $goal->goal_mitsumori * 100  }},
              ],
        @endforeach
        borderColor: "rgb(154, 162, 235)",
        yAxisID: "y-axis-1",
      },{
        label: '前フェーズからの移行率',
        type: 'line',
        fill: false,
        lineTension: 0,
        data: [
                {{ $mitsumori_su_04 / $contact_su_04  * 100 }},
                {{ $mitsumori_su_05 / $contact_su_05  * 100 }},
                {{ $mitsumori_su_06 / $contact_su_06  * 100 }},
                {{ $mitsumori_su_07 / $contact_su_07  * 100 }},
                {{ $mitsumori_su_08 / $contact_su_08  * 100 }},
                {{ $mitsumori_su_09 / $contact_su_09  * 100 }},
                {{ $mitsumori_su_10 / $contact_su_10  * 100 }},
                {{ $mitsumori_su_11 / $contact_su_11  * 100 }},
                {{ $mitsumori_su_12 / $contact_su_12  * 100 }},
                {{ $mitsumori_su_01 / $contact_su_01  * 100 }},
                {{ $mitsumori_su_02 / $contact_su_02  * 100 }},
                {{ $mitsumori_su_03 / $contact_su_03  * 100 }},
              ],
        borderColor: "rgb(154, 162, 135)",
        yAxisID: "y-axis-2",
      }]
    },
    options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 100,
                            min: 0,
                            stepSize: 10
                        },
                      },{
                        id: "y-axis-2",
                        type: "linear",
                        position: "right",
                        ticks: {
                            max: 100,
                            min: 0,
                            stepSize: 10
                        },
                        gridLines: {
                            drawOnChartArea: false,
                        },
                  }],
                },
            }
});
//案件発生数
var ctx = document.getElementById("process3").getContext('2d');
var process3 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['4月','5月','6月','7月','8月','9月','10月','11月','12月','1月','2月','3月'],
      datasets: [{
        label: '案件発生数',
        data: [
          {{ $anken_su_04 }},
          {{ $anken_su_05 }},
          {{ $anken_su_06 }},
          {{ $anken_su_07 }},
          {{ $anken_su_08 }},
          {{ $anken_su_09 }},
          {{ $anken_su_10 }},
          {{ $anken_su_11 }},
          {{ $anken_su_12 }},
          {{ $anken_su_01 }},
          {{ $anken_su_02 }},
          {{ $anken_su_03 }},
        ],
      },{
        label: '達成率',
        type: 'line',
        fill: false,
        lineTension: 0,
        data: [
          {{  $anken_su_04 / $goal->goal_anken * 100  }},
          {{  $anken_su_05 / $goal->goal_anken * 100  }},
          {{  $anken_su_06 / $goal->goal_anken * 100  }},
          {{  $anken_su_07 / $goal->goal_anken * 100  }},
          {{  $anken_su_08 / $goal->goal_anken * 100  }},
          {{  $anken_su_09 / $goal->goal_anken * 100  }},
          {{  $anken_su_10 / $goal->goal_anken * 100  }},
          {{  $anken_su_11 / $goal->goal_anken * 100  }},
          {{  $anken_su_12 / $goal->goal_anken * 100  }},
          {{  $anken_su_01 / $goal->goal_anken * 100  }},
          {{  $anken_su_02 / $goal->goal_anken * 100  }},
          {{  $anken_su_03 / $goal->goal_anken * 100  }},
        ],
        borderColor: "rgb(154, 162, 235)",
        yAxisID: "y-axis-1",
      },{
        label: '前フェーズからの移行率',
        type: 'line',
        fill: false,
        lineTension: 0,
        data: [
          {{ $anken_su_04 / $mitsumori_su_04  * 100 }},
          {{ $anken_su_05 / $mitsumori_su_05  * 100 }},
          {{ $anken_su_06 / $mitsumori_su_06  * 100 }},
          {{ $anken_su_07 / $mitsumori_su_07  * 100 }},
          {{ $anken_su_08 / $mitsumori_su_08  * 100 }},
          {{ $anken_su_09 / $mitsumori_su_09  * 100 }},
          {{ $anken_su_10 / $mitsumori_su_10  * 100 }},
          {{ $anken_su_11 / $mitsumori_su_11  * 100 }},
          {{ $anken_su_12 / $mitsumori_su_12  * 100 }},
          {{ $anken_su_01 / $mitsumori_su_01  * 100 }},
          {{ $anken_su_02 / $mitsumori_su_02  * 100 }},
          {{ $anken_su_03 / $mitsumori_su_03  * 100 }},
        ],
        borderColor: "rgb(154, 162, 135)",
        yAxisID: "y-axis-2",
      }]
    },
    options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 120,
                            min: 0,
                            stepSize: 10
                        },
                      },{
                        id: "y-axis-2",
                        type: "linear",
                        position: "right",
                        ticks: {
                            max: 120,
                            min: 0,
                            stepSize: 10
                        },
                        gridLines: {
                            drawOnChartArea: false,
                        },
                  }],
                },
            }
});
//成約件数
var ctx = document.getElementById("process4").getContext('2d');
var process4 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['4月','5月','6月','7月','8月','9月','10月','11月','12月','1月','2月','3月'],
      datasets: [{
        label: '成約数',
        data: [
          {{ $seiyaku_su_04 }},
          {{ $seiyaku_su_05 }},
          {{ $seiyaku_su_06 }},
          {{ $seiyaku_su_07 }},
          {{ $seiyaku_su_08 }},
          {{ $seiyaku_su_09 }},
          {{ $seiyaku_su_10 }},
          {{ $seiyaku_su_11 }},
          {{ $seiyaku_su_12 }},
          {{ $seiyaku_su_01 }},
          {{ $seiyaku_su_02 }},
          {{ $seiyaku_su_03 }},
        ],
      },{
        label: '達成率',
        type: 'line',
        fill: false,
        lineTension: 0,
        data: [
          {{ $seiyaku_su_04 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_05 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_06 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_07 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_08 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_09 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_10 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_11 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_12 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_01 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_02 / $goal->goal_seiyaku * 100 }},
          {{ $seiyaku_su_03 / $goal->goal_seiyaku * 100 }},
        ],
        borderColor: "rgb(154, 162, 235)",
        yAxisID: "y-axis-1",
      },{
        label: '前フェーズからの移行率',
        type: 'line',
        fill: false,
        lineTension: 0,
        data: [
          {{ $seiyaku_su_04 / $anken_su_04  * 100 }},
          {{ $seiyaku_su_05 / $anken_su_05  * 100 }},
          {{ $seiyaku_su_06 / $anken_su_06  * 100 }},
          {{ $seiyaku_su_07 / $anken_su_07  * 100 }},
          {{ $seiyaku_su_08 / $anken_su_08  * 100 }},
          {{ $seiyaku_su_09 / $anken_su_09  * 100 }},
          {{ $seiyaku_su_10 / $anken_su_10  * 100 }},
          {{ $seiyaku_su_11 / $anken_su_11  * 100 }},
          {{ $seiyaku_su_12 / $anken_su_12  * 100 }},
          {{ $seiyaku_su_01 / $anken_su_01  * 100 }},
          {{ $seiyaku_su_02 / $anken_su_02  * 100 }},
          {{ $seiyaku_su_03 / $anken_su_03  * 100 }},
        ],
        borderColor: "rgb(154, 162, 135)",
        yAxisID: "y-axis-2",
      }]
    },
    options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 120,
                            min: 0,
                            stepSize: 10
                        },
                      },{
                        id: "y-axis-2",
                        type: "linear",
                        position: "right",
                        ticks: {
                            max: 120,
                            min: 0,
                            stepSize: 10
                        },
                        gridLines: {
                            drawOnChartArea: false,
                        },
                  }],
                },
            }
});

// 売上推移グラフ
  var ctx = document.getElementById("sales");
  var sales = new Chart(ctx, {
      type: 'bar', // チャートのタイプ
      data: { // チャートの内容
          labels: ['4月','5月','6月','7月','8月','9月','10月','11月','12月','1月','2月','3月'],
          datasets: [{
              label: '前々年',
              data: [
                {{ $sales_amount_04_n2 }},
                {{ $sales_amount_05_n2 }},
                {{ $sales_amount_06_n2 }},
                {{ $sales_amount_07_n2 }},
                {{ $sales_amount_08_n2 }},
                {{ $sales_amount_09_n2 }},
                {{ $sales_amount_10_n2 }},
                {{ $sales_amount_11_n2 }},
                {{ $sales_amount_12_n2 }},
                {{ $sales_amount_01_n2 }},
                {{ $sales_amount_02_n2 }},
                {{ $sales_amount_03_n2 }},
              ],
              backgroundColor: 'rgba(255, 99, 132, 0.5)',
              borderWidth: 1
          }, {
              label: '前年',
              data: [
                {{ $sales_amount_04_n1 }},
                {{ $sales_amount_05_n1 }},
                {{ $sales_amount_06_n1 }},
                {{ $sales_amount_07_n1 }},
                {{ $sales_amount_08_n1 }},
                {{ $sales_amount_09_n1 }},
                {{ $sales_amount_10_n1 }},
                {{ $sales_amount_11_n1 }},
                {{ $sales_amount_12_n1 }},
                {{ $sales_amount_01_n1 }},
                {{ $sales_amount_02_n1 }},
                {{ $sales_amount_03_n1 }},
               ],
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              borderWidth: 1
          }, {
            label: '当年',
            data: [
              {{ $sales_amount_04 }},
              {{ $sales_amount_05 }},
              {{ $sales_amount_06 }},
              {{ $sales_amount_07 }},
              {{ $sales_amount_08 }},
              {{ $sales_amount_09 }},
              {{ $sales_amount_10 }},
              {{ $sales_amount_11 }},
              {{ $sales_amount_12 }},
              {{ $sales_amount_01 }},
              {{ $sales_amount_02 }},
              {{ $sales_amount_03 }},
            ],
            backgroundColor: 'rgba(99, 255, 112, 0.5)',
            borderWidth: 1
          }]
      },
      options: { // チャートのその他オプション
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      //y軸の桁数区切り
                      callback: function(label, index, labels) {
                        return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') +' 円';
                    }
                  }
              }]
          }
      }
  });

// 占有率グラフ(月別)
// var ctx = document.getElementById("share").getContext('2d');
// var share = new Chart(ctx, {
// type: 'pie',
// data: {
//   labels: ["自動車","建設","金融"],
//   datasets: [{
//     backgroundColor: [
//       "#2ecc71",
//       "#3498db",
//       "#95a5a6",
//     ],
//     data: [
//       {{ $sales_amount_car }},
//       {{ $sales_amount_kensetsu }},
//       {{ $sales_amount_kinyu }},
//     ]
//   }]
// }
// });
// 占有率グラフ(月別)
var ctx = document.getElementById("share").getContext('2d');
var share = new Chart(ctx, {
type: 'pie',
data: {
  labels: ["自動車","建設","金融"],
  datasets: [{
    backgroundColor: [
      "#2ecc71",
      "#3498db",
      "#95a5a6",
    ],
    data: [
      {{ round($sales_amount_car / $industory_salesAmountData  * 100, 1) }},
      {{ round($sales_amount_kensetsu / $industory_salesAmountData  * 100, 1) }},
      {{ round($sales_amount_kinyu / $industory_salesAmountData * 100, 1) }},
    ]
  }]
}
});




</script>
@endsection
