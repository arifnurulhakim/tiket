@extends('adminlte::page')

@section('title', 'List Wahana')

@section('content_header')
    <h1 class="m-0 text-dark">List Wahana</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href="{{route('wahana.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($wahana as $key => $wahana)
                            <tr>
                            <td>{{$key+1}}</td>
                                <td>{{$wahana->nama_wahana}}</td>
                                <td>{{$wahana->deskripsi}}</td>
                                {{--   <td>$wahana->nama_wahana</td> --}}
                                {{--   <td>$wahana->deskripsi</td> --}}
                                {{--   <td>$wahana->harga_weekday</td> --}}
                                {{--   <td>$wahana->harga_weekend</td> --}}
                                {{--   <td><img height="150px" width="150px" src="data:image/jpg;base64,{{ $wahana->foto_wahana}}" /></td> --}}
                                <td>
                                    <a href="{{route('wahana.edit', $wahana->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('wahana.destroy', $wahana)}}"  onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $wahana->id }}" data-toggle="modal" data-target="#detailWahana">
                                        detail
                                    </div>
                                
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
    <div class="modal fade" id="detailWahana" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Wahana Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <!-- tambahkan tag </div> di bawah ini -->
    </div>
  </div>
</div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
         $('.btn-detail').click(function(e) {
            e.preventDefault();
            var postId = $(this).data('id');  
            $.ajax({
                url: '/wahana/' + postId,
                type: 'GET',
                success: function(data) {
                    $('.modal-body').html(`
                    <div class="form-group text-center">
            <img class="img-fluid"src="data:image/jpg;base64,${data.foto_wahana}" alt="Wahana Picture">
        </div>


                <div class="form-group">
            <label for="nama_wahana">
                Nama Wahana
             </label>
             <p class="text-bold">${data.nama_wahana}</p>   
        </div>
        <hr>
                <div class="form-group">
            <label for="deskripsi">
                Deskripsi
             </label>
             <p class="text-bold">${data.deskripsi}</p>   
        </div>
        <hr>
                <div class="form-group">
            <label for="harga_weekday">
                Harga Weekday
             </label>
             <p class="text-bold">${data.harga_weekday}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="harga_weekend">
                Harga Weekend
             </label>
             <p class="text-bold">${data.harga_weekend}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="total_rating">
                Banyaknya yang memberi rating
             </label>
             <p class="text-bold">${data.total_rating}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="total_rating">
                Rating
             </label>
             <p class="text-bold">${data.rata_rating}</p>   
        </div>
        <hr>
      </div>
    </div>`);
                $('#detailWahana').modal('show');
            }
                });
            });
 
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
