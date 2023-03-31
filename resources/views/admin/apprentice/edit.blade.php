@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/apprentices">Aprendices</a></li>
    <li class="breadcrumb-item active">Editar aprendiz</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
            
                <div class="card-body">
                    {!!Form::open(array(
                    'url' => route('apprentice.edit',$apprentice->id),
                    'id' =>'editform',
                    ))!!}
                    
                    <div class="mb-3">
                        <label for="document_number" class="form-label">Numero Documento</label>
                        {!! Form::number('document_number',$apprentice->document_number, ['class'=>'form-control'])!!}
                        
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        {!! Form::text('name',$apprentice->name, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Ciudad</label>
                        {!! Form::text('city',$apprentice->city, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        {!! Form::email('email',$apprentice->email, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telefono</label>
                        {!! Form::number('telephone',$apprentice->telephone, ['class'=>'form-control'])!!}
                    </div>
                    <button type="submit" name="op" id="edit" value="add" class="btn btn-primary">Agregar</button>
                    

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

<!---confirmacion sweetalert edit--->

@endsection