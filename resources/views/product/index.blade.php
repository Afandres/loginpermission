@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active">Productos</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header">{{ $title }}</div>
            
                <div class="card-body">
                <br>
                    <table id="table" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{trans('productos.Name')}}</th>
                            <th>{{trans('productos.Photo')}}</th>
                            <th>{{trans('productos.Category')}}</th>
                            <th>{{trans('productos.Price')}}</th>
                            <th>{{trans('productos.Description')}}</th>
                            <th></th>
                            <th>
                                <a href="{{ route('product.add') }}" class="btn btn-succes btn-sm"><i class="fa-solid fa-plus"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>
                                <img src="{{ asset($p->photo)}}" alt="{{$p->photo}}"  class="img-fluid img-thumbnail" width="90px">
                            </td>
                            <td>{{$p->category}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->description}}</td>
                            <td>
                                <a href="{{ route('product.edit',$p->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i></a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" id="delete" value="{{ $p->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--- datatable--->
<script>
    $(document).ready( function () {
    $('#table').DataTable({
        language: {
            search: "Buscar:"
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy","excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    
} );
</script>

<!--- confirmacion sweetalert--->
<script>

$(document).on('click','#delete',function(){
    var id = $(this).val()
    Swal.fire({
  title: 'Esta seguro?',
  text: "Esta accion no se puede revertir!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminalo!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El registro ha sido eliminado.',
      'success'
    )
    $(location).attr('href', '{{ url('products/delete/') }}/'+id);
  }
})
});
</script>
@endsection