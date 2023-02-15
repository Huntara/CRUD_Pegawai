@extends('layout')
@section('content')

    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
          <div style="margin-left:310px;">
            <div>
                <h2>Edit Pegawai</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
      <script>
      swal("Error!", "Harus mengisi semua input!", "error");
      </script>
    @endif
  
    <form  action="{{ route('ubah',$pegawai->id) }}" method="POST" class="margin-tb w-50 d-12 m-auto">
        @csrf
        @method('PATCH')
  <div>
    <div class="form-group">
      <strong>Nama</strong>
      <input type="text" class="form-control" name="nama" value="{{ ($pegawai->nama) }}">
    </div>
   
    <div class="form-group">
      <strong>Umur</strong>
      <input type="number" name="umur" class="form-control" value="{{ $pegawai->umur }}">
    </div>
  </div>
  <div>
  <div class="form-group">
      <strong>Divisi</strong>
      <select name="divisi" class="form-control">
        <option>Pilih</option>
        <option value="guru" {{ $pegawai->devisi == "guru"? 'selected' : ''}}>Guru</option>
        <option value="laboran" {{ $pegawai->devisi == "laboran"? 'selected' : ''}}>Laboran</option>
        <option value="staff" {{ $pegawai->devisi == "staff"? 'selected' : ''}}>Staff</option>
      </select>
    </div>
    <div class="form-group">
      <strong>JK</strong>
      <input type="text" class="form-control" name="JK" value="{{ ($pegawai->JK) }}">
    </div>
  </div>
  <a class="btn btn-primary mt-2" href="{{ route('home') }}" role="button">Back</a>
  <button type="submit" class="btn btn-success mt-2">Submit</button>
</form>
@endsection