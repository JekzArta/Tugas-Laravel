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

<h1>Form Siswa cuy</h1>
<form action="{{ url('kelas')}}" method="POST">
    @csrf

    Nama Kelas : <input type="text" name="nama_kelas"> <br>
    Jurusan : <input type="text" name="jurusan"> <br>
    Nama Wali Kelas : <input type="text" name="nama_wali_kelas"> <br>
    Lokasi Ruangan : <input type="text" name="lokasi_ruangan"> <br>
    <input type="submit" value="Simpan">
</form>