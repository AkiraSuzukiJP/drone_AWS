@extends('layouts.layouts')

@section('content')
<h1>飛行記録一覧</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>操縦者ID</th>
        <th>飛行概要</th>
        <th>機体ID</th>
        <th>離陸場所</th>
        <th>離陸時刻</th>
        <th>着陸場所</th>
        <th>着陸時刻</th>
        <th>飛行時間</th>
        <th>総飛行時間</th>
        <th>飛行の安全に影響のあった事項</th>
        <th>飛行年月日</th>
    </tr>
    @foreach($flight_records as $flight_record)
    <tr>
        <td>{{ $flight_record->id}}</td>
        <td>{{ $flight_record->pilot_id}}</td>
        <td>{{ $flight_record->overview}}</td>
        <td>{{ $flight_record->aircraft_id}}</td>
        <td>{{ $flight_record->takeoff_place}}</td>
        <td>{{ $flight_record->takeoff_time}}</td>
        <td>{{ $flight_record->landing_place}}</td>
        <td>{{ $flight_record->landing_time}}</td>
        <td>{{ $flight_record->flight_time}}</td>
        <td>{{ $flight_record->total_flight_time}}</td>
        <td>{{ $flight_record->notices}}</td>
        <td>{{ $flight_record->flight_date}}</td>
    </tr>
    <div id="app">
            <example-component></example-component>
    </div>
    <script src="js/app.js"></script>
    @endforeach
</table>
<button><a href="{{ url('/') }}" class="text-sm text-gray-700 underline">戻る</a></button>
@endsection

