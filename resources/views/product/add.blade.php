@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/products">Productos</a></li>
    <li class="breadcrumb-item active">Agregar productos</li>
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
                    'url' => route('product.add'),
                    'id' =>'editform',
                    'method'=> 'POST',
                    'enctype' => 'multipart/form-data'
                    ))!!}
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <input type="text" class="form-control" id="" name="category">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio unitario</label>
                        <input type="number" class="form-control" id="" name="price">
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="" name="photo" accept=".jpg , .png , .gif">
                    </div>
                    <button type="submit" name="op" value="add" class="btn btn-primary">Agregar</button>
                    

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection