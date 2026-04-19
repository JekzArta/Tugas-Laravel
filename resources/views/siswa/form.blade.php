@session('error')
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian!</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(!empty(@$siswa))
    <h1>Edit siswa "{{ @$siswa->nama_lengkap }}"</h1>
@else
    <h1>Form Siswa cuy</h1>
@endif

<form action="{{ url('siswa', @$siswa->id) }}" method="POST">
    @csrf

    @if(!empty(@$siswa))
        @method('PATCH')
    @endif

    NIS : <input type="text" name="nis" value="{{ old('nis', @$siswa->nis) }}"> <br>
    Nama Lengkap : <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}"> <br>
    Jenis Kelamain : <br> 
    <label for="L"> <input type="radio" name="jk" id="L" value="L" {{ old('jk', @$siswa->jk) == 'L' ? 'checked' : '' }}> Laki-Laki </label> <br> <!-- Pokokna mah nanyakeun pakai old terus ka jk ari ieu teh L? mun heeh Checked mun henteu nya keun bae weh kosong '' -->
    <label for="P"> <input type="radio" name="jk" id="P" value="P" {{ old('jk', @$siswa->jk) == 'P' ? 'checked' : '' }}> Perempuan </label> <br> <!-- Sama ngan beda gender jeung value-->
    Golongan Darah:
    <select name="golongan_darah">
        <option value="" {{ old('golongan_darah', @$siswa->golongan_darah) == '' ? 'selected' : '' }}>Pilih Golongan Darah</option> <!--  Mun ieu mah orang aneh mun milih ieu, tapi tetep kita kasih if else weh walau teu guna soalna mau isi ieu atau hente, tetep weh ieu-->
        <option value="A" {{ old('golongan_darah', @$siswa->golongan_darah) == 'A' ? 'selected' : '' }}>A</option> <!-- nya kitu weh -->
        <option value="B" {{ old('golongan_darah', @$siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option> <!-- enya bener sama-->
        <option value="O" {{ old('golongan_darah', @$siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option> <!-- yap heeh -->
        <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option> <!-- heeh sama -->
    </select>
    <input type="submit" value="Simpan">
</form>