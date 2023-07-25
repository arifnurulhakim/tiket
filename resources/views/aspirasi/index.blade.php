@extends('adminlte::page')

@section('title', 'List Aspirasi')

@section('content_header')
    <h1 class="m-0 text-dark">List Aspirasi</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($aspirasi as $key => $aspirasi)
                            <tr>
                              
                                <td>{{$key+1}}</td>
                                <td>{{$aspirasi->nim}}</td>
                                <td>{{$aspirasi->nama}}</td>
                                <td>{{$aspirasi->kategori}}</td>
                              
                                {{-- <td><img height="60px" width="60px" rel="tooltip" src="{{'/storage/gambar/'.$aspirasi->image}}"/></td> --}}
                                <td>{{$aspirasi->status}}<td>
                                    <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $aspirasi->id }}" data-toggle="modal" data-target="#detailAspirasi">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </div>
                                    
                                    <a href="{{route('aspirasi.destroy', $aspirasi)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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
  <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="detailAspirasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Aspirasi Detail</h5>
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
            url: '/aspirasi/' + postId,
            type: 'GET',
            success: function(data) {     
                $('.modal-body').html(`
                
    
        <div class="form-group text-center">
            <img class="img-fluid"src="data:image/jpg;base64,${data.image}" alt="Aspirasi Picture">
</div>
        <div class="form-group">
            <label for="nim">
                NIM
             </label>
             <p class="text-bold">${data.nim}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="nama">
                NAMA
             </label>
             <p class="text-bold">${data.nama}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="kategori">
                Kategori
             </label>
             <p class="text-bold">${data.kategori}</p>   
        </div>
        <hr>
        <div class="form-group">
            <label for="aspirasi">
                Aspirasi
             </label>
             <p>${data.aspirasi}</p>   
        <hr>
        </div>
        <div class="modal-footer">

            
            <form action="{{ route('aspirasi.update', $aspirasi) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="dismiss">
            <button type="submit" class="btn btn-danger">Tidak Diterima</button>
            </form>
            <form action="{{ route('aspirasi.update', $aspirasi) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="pending">
            <button type="submit" class="btn btn-info">Dipertimbangkan</button>
            </form>
            <form action="{{ route('aspirasi.update', $aspirasi) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="accept">
            <button type="submit" class="btn btn-success">Diterima</button>
            </form
        </div>
      </div>
    </div>`);
                $('#detailAspirasi').modal('show');
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
