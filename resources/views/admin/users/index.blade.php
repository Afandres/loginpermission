@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active">Productos</li>
</ol>
@endsection

@section('content')
    @livewire('admin.users-index')
@endsection