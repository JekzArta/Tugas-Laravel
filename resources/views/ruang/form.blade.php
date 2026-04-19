@session('error')
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger" style="color: red;">
        <strong>AI KAMU NGAPAIN? ERROR NIH:</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(!empty(@$kelas))
    <h1>Edit Kelas "{{ @$kelas->nama_kelas }}"</h1>
@else
    <h1>Form Kelas cuy</h1>
@endif
<form action="{{ url('kelas', @$kelas->id)}}" method="POST">
    @csrf
    @if(isset($kelas))
        @method('PATCH')
    @endif

    Nama Kelas : <input type="text" name="nama_kelas" value="{{ old('nama_kelas', @$kelas->nama_kelas) }}"> <br>
    Jurusan : <input type="text" name="jurusan" value="{{ old('jurusan', @$kelas->jurusan) }}"> <br>
    Nama Wali Kelas : <input type="text" name="nama_wali_kelas" value="{{ old('nama_wali_kelas', @$kelas->nama_wali_kelas) }}"> <br>
    Lokasi Ruangan : <input type="text" name="lokasi_ruangan" value="{{ old('lokasi_ruangan', @$kelas->lokasi_ruangan) }}"> <br>
    <input type="submit" value="Simpan">
</form>