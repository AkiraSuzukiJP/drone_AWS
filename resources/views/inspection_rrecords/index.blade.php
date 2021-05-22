@extends('layouts.layouts')

@section('content')
<h1>点検記録一覧</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>点検者ID</th>
        <th>機体全体</th>
        <th>プロペラ（外観）</th>
        <th>プロペラ（損傷）</th>
        <th>プロペラ（歪み）</th>
        <th>フレーム（外観）</th>
        <th>フレーム（損傷）</th>
        <th>フレーム（歪み）</th>
        <th>通信系統</th>
        <th>推進系統</th>
        <th>電源系統</th>
        <th>自動制御系統</th>
        <th>操縦装置（外観）</th>
        <th>操縦装置（スティックの健全性）</th>
        <th>操縦装置（スイッチの健全性）</th>
        <th>特記事項</th>
        <th>点検日</th>
    </tr>
    @foreach($inspection_rrecords as $inspection_rrecord)
    <tr>
        <td>{{ $inspection_rrecord->id}}</td>
        <td>{{ $inspection_rrecord->inspector_id}}</td>
        <td>{{ $inspection_rrecord->result_0}}</td>
        <td>{{ $inspection_rrecord->result_1}}</td>
        <td>{{ $inspection_rrecord->result_2}}</td>
        <td>{{ $inspection_rrecord->result_3}}</td>
        <td>{{ $inspection_rrecord->result_4}}</td>
        <td>{{ $inspection_rrecord->result_5}}</td>
        <td>{{ $inspection_rrecord->result_6}}</td>
        <td>{{ $inspection_rrecord->result_7}}</td>
        <td>{{ $inspection_rrecord->result_8}}</td>
        <td>{{ $inspection_rrecord->result_9}}</td>
        <td>{{ $inspection_rrecord->result_10}}</td>
        <td>{{ $inspection_rrecord->result_11}}</td>
        <td>{{ $inspection_rrecord->result_12}}</td>
        <td>{{ $inspection_rrecord->result_13}}</td>
        <td>{{ $inspection_rrecord->notice}}</td>
        <td>{{ $inspection_rrecord->inspection_date}}</td>
    </tr>
    @endforeach
</table>
<button><a href="{{ url('/') }}" class="text-sm text-gray-700 underline">戻る</a></button>
@endsection

