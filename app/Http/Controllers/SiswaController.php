<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index(){
        // $siswa = DB::table('t_siswa')->get();
        // return view('belajar', compact('siswa'));

        $data['siswa'] = \app\Siswa::orderBy('jk')->get();
        return view('belajar', $data);
    }

    function store(Request $request){

        // $request->validate([
        //     'nis' => 'required|numeric',
        //     'nama_lengkap' => 'required|string|max:255', //Contohnya digunakan pada validasi max, dengan ‘key’ => ‘rule1:value|rule2’
        //     'jk' => 'required',
        //     'golongan_darah' => 'required',
        // ]);

        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required'
        ];
        $this->validate($request, $rule);
        
        $input = $request->all();
        // unset($input['_token']); //menghindari token yang diinput oleh laravel karena input all() akan mengambil semua data yang diinput
        // $status = DB::table('t_siswa')->insert($input);
        
        $status = \App\Siswa::create($input);
        if($status){
            return redirect('/siswa')-> with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('/siswa/create')-> with('error', 'Data Gagal Ditambahkan');
        }
        
    }
    //return view(‘siswa.form’)
    //Menampilkan view dengan nama form pada folder views/siswa/
    function create(){
        return view('siswa.form');
    } 

    function pelajarUsername($username){
        return view('pelajar', compact('username')); //mengirim data username ke view pelajar, agar dibaca harus {{ $username }}
    }

    function pelajarNumeric($id){
        return view('numeric', compact('id')); //ngirim data ke view dengan nama variabel = username,Isinya berasal dari $nama di route dan agar dibaca harus {{ $numericId }}
    }

    function pelajarName($name){
        return view('pelajarjar', compact('name')); //pelajarjar itu nama file yang akan diakses di views
    }

    function edit(Request $request, $id){
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function update(Request $request, $id){
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required'
        ];
        $this->validate($request, $rule);
        
        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);
        $siswa = \App\Siswa::find($id);
        $status = $siswa->update($input);

        if($status){
            return redirect('/siswa')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect('/siswa/edit/'.$id)->with('error', 'Data Gagal Diupdate');
        }
    }

    function destroy($id){
        $siswa = \App\Siswa::find($id);
        $status = $siswa->delete();


        //$status = DB::table('t_siswa')->where('id', $id)->delete();
        if($status){
            return redirect('/siswa')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('/siswa')->with('error', 'Data Gagal Dihapus');
        }
    }
}
