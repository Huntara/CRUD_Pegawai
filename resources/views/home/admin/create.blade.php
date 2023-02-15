@extends('layout')
@section('content')

<div class="row mt-5">
  <div clas="col-lg-12 margin-tb">
    <div style="margin-left:330px;">
      <h2>Tambah Pegawai</h2>
    </div>
  </div>
</div>

@if ($errors->any())
      <script>
      swal("Error!", "Harus mengisi semua input!", "error");
      </script>
@endif

<form action="{{ route('kirim-data')}}" method="POST" class="margin-tb w-50 d-12 m-auto ">
  @csrf
  <div>
    <div class="form-group">
      <strong>Nama</strong>
      <input type="text" class="form-control" name="nama">
    </div>
   
    <div class="form-group">
      <strong>Umur</strong>
      <input type="number" name="umur" class="form-control">
    </div>
  </div>
  <div>
  <div class="form-group">
      <strong>Divisi</strong>
      <select name="divisi" class="form-control">
        <option hidden>Pilih</option>
        <option>Guru</option>
        <option>Laboran</option>
        <option>Staff</option>
      </select>
    </div>
    <div class="form-group">
      <strong>Jenis Kelamin</strong>
      <select name="JK" class="form-control">
        <option hidden>Pilih</option>
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
  </div>
  <a class="btn btn-primary mt-2" href="{{ route('home') }}" role="button">Back</a>
    <button type="submit" class="btn btn-success mt-2">Submit</button>
</form>
@endsection