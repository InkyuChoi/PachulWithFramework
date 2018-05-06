@extends('layouts.master')

@section('content')
    <p>저는 자식 뷰의 컨텐트 섹션입니다.</p>
@endsection

@section('style')
    <style>
        body{
            background: green;}
    </style>
@endsection

@section('script')
    <script>
        alert("스크립트으ㅡㅡㅡ")
    </script>
@endsection