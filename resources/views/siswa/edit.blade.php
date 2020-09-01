@extends('layouts.master')

@section('content')
    <h1>Edit Data siswa</h1>
            @if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
            @endif
        <div class="row">
        <div class="col-lg-12">
        <form action="/siswa/{{$siswa->id}}/update " method="POST">
             {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama" value="{{$siswa->agama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <input name="alamat" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$siswa->alamat}}"></input>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning ">Update</button>
                <a href="/siswa" class="btn btn-secondary">Cancel</a>
            </form>

    </div>
    </div>


@endsection
