@extends('layouts.layouts')

@section('content')
<h1>点検者一覧</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>点検者名</th>
    </tr>
    @foreach($inspectors as $inspector)
    <tr>
        <td>{{ $inspector->id}}</td>
        <td>{{ $inspector->name}}</td>
    </tr>
    @endforeach
</table>
<button><a href="{{ url('/') }}" class="text-sm text-gray-700 underline">戻る</a></button>
@endsection

