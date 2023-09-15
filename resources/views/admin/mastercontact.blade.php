@extends('admin.admin')

@section('title_admin', 'Master Contact')
@section('content-title', 'Master Contact')
@section('content')
    <a href="{{ route('createcontact')}}">Create Contact</a>
    <br>
    <a href="{{ route('editcontact')}}">Edit Contact</a>
@endsection
