Belajar Laravel, Tulisan ini ditampilkan dari Views<br>
@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
@session('error')
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endsession

<a href="{{ url('/kelas/create') }}">TAMBAHKEUN DIDIEU EUY</a>
<table border="1">
    <tr>
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Jurusan</td>
        <td>Nama Wali Kelas</td>
        <td>Lokasi Ruangan</td>
    </tr>
    @foreach($kelas as $row)
    <tr>
        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
        <td>{{ $row->nama_kelas }}</td>
        <td>{{ $row->jurusan }}</td>
        <td>{{ $row->nama_wali_kelas }}</td>
        <td>{{ $row->lokasi_ruangan }}</td>
    </tr>
    @endforeach
</table>