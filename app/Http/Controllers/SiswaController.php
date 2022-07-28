<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uni =  Siswa::get();

        return view('siswa.index' , compact('uni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'nis'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',

        ]);

        $uni = new Siswa();
        $uni->nis = $request->nis;
        $uni->nama = $request->nama;
        $uni->kelas = $request->kelas;
        $uni->jurusan = $request->jurusan;

        $uni->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uni = Siswa::where('id' , $id)->firstOrFail();

        $this->validate($request , [
            'nis'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',

        ]);

        $uni->nis = $request->nis;
        $uni->nama = $request->nama;
        $uni->kelas = $request->kelas;
        $uni->jurusan = $request->jurusan;

        $uni->update();

        return redirect()->back();
    }



    public function search (Request $request) {
        $uni = Siswa::where('nis' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('nama' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('kelas' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('jurusan' , 'Like' , '%' . $request->search . '%')
                        ->get();

                        return view('siswa.index' , compact('uni'));
    }
    
    //sort nama
    public function sortASCnama(Request $request) {
        $uni = Siswa::orderBy('nama' , 'asc')->get();

        return view('siswa.index' , compact('uni'));
    }

    public function sortDESCnama(Request $request) {
        $uni = Siswa::orderBy('nama' , 'desc')->get();

        return view('siswa.index' , compact('uni'));
    }

    //sort nis
    public function sortASCnis(Request $request) {
        $uni = Siswa::orderBy('nis' , 'asc')->get();

        return view('siswa.index' , compact('uni'));
    }

    public function sortDESCnis(Request $request) {
        $uni = Siswa::orderBy('nis' , 'desc')->get();

        return view('siswa.index' , compact('uni'));
    }

    //sort kelas
    public function sortASCkelas(Request $request) {
        $uni = Siswa::orderBy('kelas' , 'asc')->get();

        return view('siswa.index' , compact('uni'));
    }

    public function sortDESCkelas(Request $request) {
        $uni = Siswa::orderBy('kelas' , 'desc')->get();

        return view('siswa.index' , compact('uni'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uni = Siswa::find($id);
        $uni->delete();

        return redirect()->back();
    }
}
