@extends('adminlte::page')

@section('title', 'List Buku')

@section('content_header')
    <h1 class="m-0 text-dark">List Buku</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('buku.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Buku</th>
                            <th>Masuk tanggal</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buku as $key => $bukunya)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bukunya->nama_buku}}</td>
                                <td>{{$bukunya->created_at}}</td>
                                <td>
                                    <a href="{{route('buku.edit', $bukunya)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('buku.destroy', $bukunya)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
