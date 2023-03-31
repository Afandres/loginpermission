@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active">Productos</li>
</ol>
@endsection

@section('content')
    <h1>Asignar un rol</h1>

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            @foreach ($usuars as $user)
            <p class="form-control">{{ $user->name }}</p>
            @endforeach
           

            {!! Form::model($user, [ 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            {!! Form::close() !!}
        </div>
    </div>
@endsection