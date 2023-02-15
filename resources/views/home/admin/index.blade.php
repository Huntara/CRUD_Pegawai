@extends('layout')
@section('content')

<div class="row mt-2">
    <div class="col-lg- margin-tb">
        <div class="float-start">
            <h2 style="margin-left:50px;">CRUD Pegawai</h2>
        </div>
    </div>
</div>

<div class="mb-2 d-flex justify-content-end mr-3">
    <a class="btn btn-success" href="/tambahdata">+ Create Pegawai</a>
</div>

@if(session('success'))
        <script>
        swal("Success", "Berhasil menambahkan pegawai!", "success");
        </script>
@endif

@if(session('successDelete'))
        <script>
        swal("Delete", "Berhasil menghapus pegawai!", "success");
        </script>
@endif

@if(session('successUpdate'))
        <script>
        swal("Success", "Berhasil edit pegawai!", "success");
        </script>
@endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Divisi</th>
            <th class="text-center">Umur</th>
            <th class="text-center">JK</th>
            <th margin-right="400px">Action</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($pegawai as $pi)

        <tr>
            <td class="text-center"> {{ $no++ }} </td>
            <td> {{ $pi ['nama'] }} </td>
            <td class="text-center"> {{ $pi ['divisi'] }} </td>
            <td class="text-center"> {{ $pi ['umur'] }} </td>
            <td class="text-center"> {{ $pi ['JK'] }} </td>
            <td>
                <form action="{{ route('delete',$pi->id) }}" method="POST">
                    <a href="/edit/{{$pi->id}}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @if ($pegawai->count()==0)
    <div class="d-flex justify-content-center align-items-center">
    <h6>Data pegawai kosong harap membuat nama pegawai!</h6>
    @endif
   
@endsection