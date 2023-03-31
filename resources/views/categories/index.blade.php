@extends('layouts.adminlite')


@section('content')
<h1>
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    @foreach ($categories as $nc)
                    <tbody>
                        <tr>
                            <td>{{$nc->id }}</td>
                            <td>{{$nc->name }}</td>
                            <td>
                                <button type="button"  data-toggle="modal" data-target="#modal-update-category-{{$nc->id}}"class="btn btn-warning" >Editar</button>
                               
                                <button class="btn btn-danger btn-sm" id="del" value="{{ $nc->id }}">Eliminar</button>
                            </td>
                        </tr>
                        <!-- modal - update categories -->
                        @include('admin.categories.updatecategory')
                        <!-- /.modal -->

                    </tbody>
                    @endforeach
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Categoria</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
    $(document).ready( function () {
    $('#table3').DataTable({
        language: {
            search: "Buscar:"
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy","excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table3_wrapper .col-md-6:eq(0)');
    
} );


</script>

<script>

    $(document).on('click','#del',function(){
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
        $(location).attr('href', '{{ url('admin/categories/delete/') }}/'+id);
      }
    })
    });
    </script>
@stop




