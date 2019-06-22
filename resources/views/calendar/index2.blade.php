@extends('layouts.layout')
@section('content')
<div class="container">
  <h1 class="page_title">スケジュール</h1>

  <table border="1" class="calendar calendarTable">
    <thead>
      <tr>
        <th class="youbi_1">月</th>
        <th class="youbi_2">火</th>
        <th class="youbi_3">水</th>
        <th class="youbi_4">木</th>
        <th class="youbi_5">金</th>
        <th class="youbi_6">土</th>
        <th class="youbi_0">日</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="gray">29</td>
        <td class="gray">30</td>
        <td class="gray">31</td>
        <td>01
          <div class="cl_day_wrapper w-100 h-100">
            <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">出張(北陸)</a>
          </div>
        </td>
        <td>02</td>
        <td class="youbi_6">03</td>
        <td class="youbi_0">04</td>
      </tr>
        <td>05</td>
        <td>06</td>
        <td>07
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">新商品説明会</a>
        </td>
        <td>08</td>
        <td>09</td>
        <td class="youbi_6">10</td>
        <td class="youbi_0">11</td>
      <tr>
        <td>12</td>
        <td>13</td>
        <td>14
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">10:00 A様</a>
        </td>
        <td>15</td>
        <td>16</td>
        <td class="youbi_6">17</td>
        <td class="youbi_0">18</td>
      </tr>
      <tr>
        <td>19</td>
        <td>
          <div class="day_space w-100 h-100" data-toggle="modal" data-target="#calendarModalScrollable">
          20
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">11:00 D様</a>
          </div>
        </td>
        <td>21
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">14:00 C様</a>
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="w-100 h-100 day_space"></a>
        </td>
        <td>22</td>
        <td>23
          <a data-toggle="modal" data-target="#calendarModalScrollable" class="text-info">10:00 B様</a>
        </td>
        <td class="youbi_6">24</td>
        <td class="youbi_0">25</td>
      </tr>
      <tr>
        <td>26</td>
        <td>27</td>
        <td>28</td>
        <td>29</td>
        <td>30</td>
        <td class="youbi_6">31</td>
        <td class="gray">01</td>
      </tr>

    </tbody>
  </table>
</div>
@endsection
