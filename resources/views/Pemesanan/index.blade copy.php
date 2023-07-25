@extends('adminlte::page')

@section('title', 'List Pemesanan')

@section('content_header')
    <h1 class="m-0 text-dark">List Pemesanan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Pemesanan</th>
                                <th>Atas Nama</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemesanan as $key => $pemesanans)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pemesanans->kode_pemesanan}}</td>
                                    <td>{{ $pemesanans->nama }}</td>
                                    <td>
                                  
                                    <a href="{{route('pemesanan.destroy', $pemesanans)}}"  onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $pemesanans->id }}" data-toggle="modal" data-target="#detailPemesanan">
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
    <div class="modal fade" id="detailPemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pemesanan Detail</h5>
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
            url: 'pemesanan/' + postId,
            type: 'GET',
            success: function(data) {     
                $('.modal-body').html(`
                
                <div class="form-group">
            <label for="nama">
                Nama
             </label>
             <p class="text-bold">${data.nama}</p>   
        </div>
        <hr>
            
        <div class="form-group text-center">
            <img class="img-fluid"src="data:image/jpg;base64,${data.foto_pemesanan}" alt="Pemesanan Picture">
        </div>

      

      </div>
    </div>`);
                $('#detailPemesanan').modal('show');
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
