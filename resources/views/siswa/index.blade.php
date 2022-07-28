@extends('layouts.master')

@section('content')

{{-- create --}}
<h1>Data Siswa</h1>
<div class="modal fade" id="tambah-pemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tambah siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/siswa/add')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="nis">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama</label> 
                <input type="text"  class="form-control" placeholder="" name="nama" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="kelas">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">jurusan</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="jurusan">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>



{{-- edit --}}
@foreach ($uni as $data)
    
<div class="modal fade" id="edit-siswa{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit data siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/siswa/edit/'. $data->id)}} method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="nis" value="{{ $data->nis }}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama</label> 
                <input type="text"  class="form-control" placeholder="" name="nama" autocomplete="off" value="{{ $data->nama }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="kelas" value="{{ $data->kelas }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">jurusan</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="jurusan" value="{{ $data->jurusan }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>
@endforeach


{{-- delete --}}
@foreach ($uni as $data)
<div class="modal fade" id="delete-siswa{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action={{ url('/siswa/delete/' . $data->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <center class="mt-3">
                        <h5>
                            apakah anda yakin ingin menghapus data ini?
                        </h5>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-pemasukan">
        Tambah Data
    </button>

     <form class="d-flex"  method="GET"  action="{{ url('siswa/search') }}"  role="search" >
              <input class="form-control me-2" type="search" name="search"   placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">
                <span>
                    nis
                    <a href="{{ url('/siswa/sort/ascNis') }}" name="nis"><i class="fa fa-arrow-up"></i></a>
                    <a href="{{ url('/siswa/sort/descNis') }}" name="nis"><i class="fa fa-arrow-down"></i></a>
            </span>
        </th>
            <th> 
                <span>
                    nama
                <a href="{{ url('/siswa/sort/ascNama') }}" name="nama"><i class="fa fa-arrow-up"></i></a>
                <a href="{{ url('/siswa/sort/descNama') }}" name="nama"><i class="fa fa-arrow-down"></i></a>

                    
                </span>
            </th>
            <th scope="col"><span>
                kelas
                <a href="{{ url('/siswa/sort/ascKelas') }}" name="kelas"><i class="fa fa-arrow-up"></i></a>
                <a href="{{ url('/siswa/sort/descKelas') }}" name="kelas"><i class="fa fa-arrow-down"></i></a>        
            </span>
        </th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>


        <tbody>
            @foreach ($uni as $data)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nis }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->kelas }} {{ $data->jurusan }}</td>
            <td>
                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-siswa{{ $data->id }}">edit</i></a>
                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-siswa{{ $data->id }}">delete</i></a>
            </tr>
        </td>
            @endforeach

    
        </tbody>
      </table>


@endsection