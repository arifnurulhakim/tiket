@extends('adminlte::page')

@section('title', 'List Kupon')

@section('content_header')
    <h1 class="m-0 text-dark">List Kupon</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href="{{route('kupon.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Kupon</th>
                            <th>Nama Wahana</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($kupon as $key => $kupon)
                            <tr>
                            <td>{{$key+1}}</td>
                                <td>{{$kupon->nama_kupon}}</td>
                                <td>{{$kupon->nama_wahana}}</td>
                                <td>{{$kupon->deskripsi}}</td>
                                <td>
                                    <a href="{{route('kupon.edit', $kupon->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('kupon.destroy', $kupon)}}"  onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
    <script>
      Swal.fire(
      'Success!',
      '{{session()->get('success')}}',
      'success'
      )
    </script>

    @endif
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result.value);
            if (result.value == true) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
            })
        }
    </script>
@endpush
