@extends('layouts.layouts')

@section('content')
<h1>機体一覧</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>製造者名</th>
        <th>機体名称</th>
        <th>製造番号等</th>
        <th>所有者名</th>
        <th>機体の種類</th>
        <th>最大離陸重量(kg)</th>
        <th>報告義務機体フラグ</th>
    </tr>
    @foreach($aircrafts as $aircraft)
    <tr>
        <td>{{ $aircraft->id}}</td>
        <td>{{ $aircraft->manufacturer}}</td>
        <td>{{ $aircraft->name}}</td>
        <td>{{ $aircraft->serialNo}}</td>
        <td>{{ $aircraft->owner}}</td>
        <td>{{ $aircraft->type}}</td>
        <td>{{ $aircraft->weight}}</td>
        <td>{{ $aircraft->is_report}}</td>
    </tr>
    @endforeach
</table>
@endsection

