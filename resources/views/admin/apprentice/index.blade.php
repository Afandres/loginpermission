@extends('layouts.adminlite')

@section('bat')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active">Aprendices</li>
</ol>
@endsection
@section('content')
<div class="container" style="
    margin-left: 0px;
">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header">{{ trans('aprendices.Apprentices') }}</div>
            
                <div class="card-body" style=" 
                width: 1040px;
                margin-left: 0px;
                padding-left: 0px;
                ">
                <br>
                    <table id="table1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('aprendices.Document') }}</th>
                            <th>{{ trans('aprendices.Name') }}</th>
                            <th>{{ trans('aprendices.City') }}</th> 
                            <th>{{ trans('aprendices.Email') }}</th>
                            <th>{{ trans('aprendices.telephone') }}</th>
                            <th></th>
                            <th>
                                @can('admin.apprentices.add')
                                <a href="{{ route('admin.apprentice.add') }}" class="btn btn-succes btn-sm"><i class="fa-solid fa-plus"></i></a>
                                @endcan
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apprentices as $a)
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->document_number}}</td>
                            <td>{{$a->name}}</td>
                            <td>{{$a->city}}</td>
                            <td>{{$a->email}}</td>
                            <td>{{$a->telephone}}</td>
                            <td>
                                @can('admin.apprentices.edit')
                                <a href="{{ route('admin.apprentice.edit',$a->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.apprentices.delete')
                                <button class="btn btn-danger btn-sm" id="prueba" value="{{ $a->id }}"><i class="fa-solid fa-trash"></i></button>
                                @endcan
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
    $('#table1').DataTable({
        language: {
            search: "Buscar:"
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy","excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    
} );


</script>

<!--- confirmacion sweetalert--->
<script>

$(document).on('click','#prueba',function(){
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
    $(location).attr('href', '{{ url('apprentices/delete/') }}/'+id);
  }
})
});
</script>


@endsection