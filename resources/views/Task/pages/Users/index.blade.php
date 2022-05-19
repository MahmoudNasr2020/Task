@extends('Task.layouts.app')
@section('style')
    @include('Task.pages.Users.components.extends.repository.style')
@endsection
@section('header_line')
    <li class="breadcrumb-item">المستخدمين</li>
@stop
@section('content')
    @include('Task.pages.Users.components.include.table')
@endsection
@section('script')
    @include('Task.pages.Users.components.extends.repository.script')
@endsection
