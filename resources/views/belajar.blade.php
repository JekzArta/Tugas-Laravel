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


<a href="{{ url('/siswa/create') }}">Tambah Data</a>
<table border="1">
    <tr>
        <td>No</td>
        <td>Nama Lengkap</td>
        <td>Jenis Kelamin</td>
        <td>Golongan Darah</td>
        <td>Aksi</td>
    </tr>
    @foreach($siswa as $row)
    <tr>
        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
        <td>{{ $row->nama_lengkap }}</td>
        <td>{{ $row->jk }}</td>
        <td>{{ $row->golongan_darah }}</td>
        <td> <a href="{{ url('/siswa/edit/'.$row->id) }}">Edit</a> </td>
    </tr>
    @endforeach
</table>