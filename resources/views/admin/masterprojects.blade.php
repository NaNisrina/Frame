@extends('admin.admin')

@section('title_admin', 'Master Projects')
@section('content-title', 'Master Projects')
@section('content')
    <a href="{{ route('createprojects')}}">Create Projects</a>
    <br>
    <a href="{{ route('editprojects')}}">Edit Projects</a>
@endsection
