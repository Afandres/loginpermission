@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/products">Productos</a></li>
    <li class="breadcrumb-item active">Editar productos</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    {!!Form::open(['url' => route('product.edit',$product->id)])!!}
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        {!! Form::text('name',$product->name, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        {!! Form::text('category',$product->category, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio unitario</label>
                        {!! Form::number('price',$product->price, ['class'=>'form-control'])!!}
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        {!! Form::text('description',$product->description, ['class'=>'form-control'])!!}
                    </div>
                    <button type="submit" name="op"  value="add" class="btn btn-primary">Agregar</button>
                    

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection