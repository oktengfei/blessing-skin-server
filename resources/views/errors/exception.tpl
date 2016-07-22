@extends('errors.general')

@section('title', '出现错误')

@section('content')
<h1>{{ $level }}: 出现了一些错误</h1>

<p>详细信息：{{ $message }}</p>

<p>文件位置：<b>{{ $file }}: {{ $line }}</b></p>

@endsection
