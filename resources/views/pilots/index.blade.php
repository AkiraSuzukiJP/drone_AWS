@extends('layouts.layouts')

@section('content')
<h1>操縦者一覧</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>操縦者名</th>
        <th>所属名</th>
    </tr>
    @foreach($pilots as $pilot)
    <tr>
        <td>{{ $pilot->id}}</td>
        <td>{{ $pilot->name}}</td>
        <td>{{ $pilot->belong}}</td>
    </tr>
    @endforeach
</table>
@endsection

