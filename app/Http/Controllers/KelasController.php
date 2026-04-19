<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{ //OrderBy digunakan untuk mengurutkan data berdasarkan kolom tertentu, Dengan cara OrderBy('nama_kolom', 'asc' atau 'desc')
    //where digunakan untuk memfilter data berdasarkan kolom tertentu, dengan cara where('nama_kolom', 'nilai')
    //whereOr digunakan untuk memfilter data berdasarkan kolom tertentu, dengan cara whereOr('nama_kolom', 'nilai')
    function index(){
        $kelas = DB::table('t_kelas')->get();
        return view('kelas', compact('kelas'));
    }

    function store(Request $request){
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:t_kelas,nama_kelas', //pokoknamah unique teh gaboleh sama yang udah ada di db, rumus na mah unique:nama_tabel,nama_kolom
            'jurusan' => 'required|string|max:4|in:RPL,TKJ,TOI,TITL,TAV', //nah in mah atuh in weh yang boleh didalamnya
            'nama_wali_kelas' => 'required|string|max:255', //max jeung min mah geus apal meren ahkk 
            'lokasi_ruangan' => 'nullable|min:3', //nullable berarti boleh kosong, karena terkadang ga dapet kelas yahaha
        ]);
        $input = $request->all();
        unset($input['_token']); //menghindari token yang diinput oleh laravel karena input all() akan mengambil semua data yang diinput
        $status = DB::table('t_kelas')->insert($input);
        if($status){
            return redirect('/kelas')-> with('success', 'WOIIII Berhasil Ditambahkan');
        } else {
            return redirect('/kelas/create')-> with('error', 'YAHHH Gagal Ditambahkan');
        }
        
    }
    //return view(‘siswa.form’)
    //Menampilkan view dengan nama form pada folder views/siswa/
    function create(){
        return view('ruang.form');
    } 

    function edit(Request $request, $id){
        $kelas = DB::table('t_kelas')->find($id);
        return view('ruang.form', compact('kelas'));
    }

    function update(Request $request, $id){
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:t_kelas,nama_kelas,'.$id,
            'jurusan' => 'required|string|max:4|in:RPL,TKJ,TOI,TITL,TAV',
            'nama_wali_kelas' => 'required|string|max:255',
            'lokasi_ruangan' => 'nullable|min:3',
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_kelas')->where('id', $id)->update($input);
        if($status){
            return redirect('/kelas')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect('/kelas/edit/'.$id)->with('error', 'Data Gagal Diupdate');
        }
    }

    function destroy($id){
        $status = DB::table('t_kelas')->where('id', $id)->delete();
        if($status){
            return redirect('/kelas')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('/kelas')->with('error', 'Data Gagal Dihapus');
        }
    }
}
