@extends('adminlte::page')

@section('title', 'Tambah Member')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Member</h1>
@stop

@section('content')
    <form action="{{route('member.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Kode Member</label>
                            <input type="text" class="form-control @error('kode_member') is-invalid @enderror" id="exampleInputName" placeholder="Kode Member" name="kode_member" value="{{old('kode_member')}}">
                                @error('kode_member') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Member</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="exampleInputName" placeholder="Nama Lengkap" name="nama_lengkap" value="{{old('nama_lengkap')}}">
                                @error('nama_lengkap') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Alamat Member</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Lengkap" name="alamat" value="{{old('alamat')}}">
                                @error('alamat') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">No Telepon</label>
                            <input type="text" class="form-control @error('No_Telepon') is-invalid @enderror" id="exampleInputName" placeholder="No Telepon" name="No_Telepon" value="{{old('No_Telepon')}}">
                                @error('No_Telepon') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Status</label>
                            <input type="text" class="form-control @error('Status') is-invalid @enderror" id="exampleInputName" placeholder="Status Member" name="Status" value="{{old('Status')}}">
                                @error('Status') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Kode Pinjam</label>
                            <input type="text" class="form-control @error('Kode_Pinjam') is-invalid @enderror" id="exampleInputName" placeholder="Kode Pinjam" name="Kode_Pinjam" value="{{old('Kode_Pinjam')}}">
                                @error('Kode_Pinjam') 
                                    <span class="text-danger">{{$message}}</span> 
                                @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('member.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
