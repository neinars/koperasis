<?php

namespace App\Http\Controllers;

use App\Models\Seragam; 
use Illuminate\Http\Request;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seragam::get();
        return view('seragam.index' , compact('data'));
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

    public function search (Request $request) {
        $data = Seragam::where('ukuran' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('nama' , 'Like' , '%' . $request->search . '%')
                        ->orWhere('harga' , 'Like' , '%' . $request->search . '%')
                        ->get();

                        return view('seragam.index' , compact('data'));
    }  
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request  ,[
            'nama'=>'required',
            'harga'=>'required',
            'ukuran'=>'required'

        ]);

        $data = new Seragam();
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->ukuran = $request->ukuran;


        $data->save();

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
        $data = Seragam::where('id' , $id)->firstOrFail();

        $this->validate($request  ,[
            'ukuran'=>'required',
            'nama'=>'required',
            'harga'=>'required'


        ]);

        $data->ukuran = $request->ukuran;
        $data->nama = $request->nama;
        $data->harga = $request->harga;

        $data->update();

        return redirect()->back();
    }

    public function sortASCnama(Request $request) {
        $data = Seragam::orderBy('nama' , 'asc')->get();

        return view('seragam.index' , compact('data'));
    }

    public function sortDESCnama(Request $request) {
        $data = Seragam::orderBy('nama' , 'desc')->get();

        return view('seragam.index' , compact('data'));
    }

    //sort harga
    public function sortASCharga(Request $request) {
        $data = Seragam::orderBy('harga' , 'asc')->get();

        return view('seragam.index' , compact('data'));
    }

    public function sortDESCharga(Request $request) {
        $data = Seragam::orderBy('harga' , 'desc')->get();

        return view('seragam.index' , compact('data'));
    }

    //sort ukuran
    public function sortASCukuran(Request $request) {
        $data = Seragam::orderBy('ukuran' , 'asc')->get();

        return view('seragam.index' , compact('data'));
    }

    public function sortDESCukuran(Request $request) {
        $data = Seragam::orderBy('ukuran' , 'desc')->get();

        return view('seragam.index' , compact('data'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Seragam::find($id);
        $data->delete();

        return redirect()->back();
    }


    public function filterUkuranS (Request $request) {
        if($request->uk_s ==null){
            $request->uk_s = 's';
            $req = $request->uk_s;
            $data = Seragam::where('ukuran' , 'like' , $req)->get();
        }

        return view('seragam.index' , compact('data'));
    }

    public function filterUkuranM (Request $request) {
        if($request->uk_m ==null){
            $request->uk_m = 'm';
            $req = $request->uk_m;
            $data = Seragam::where('ukuran' , 'like' , $req)->get();
        }

        return view('seragam.index' , compact('data'));
    }

    public function filterUkuranL (Request $request) {
        if($request->uk_l ==null){
            $request->uk_l = 'l';
            $req = $request->uk_l;
            $data = Seragam::where('ukuran' , 'like' , $req)->get();
        }

        return view('seragam.index' , compact('data'));
    }

    public function filterUkuranXL (Request $request) {
        if($request->uk_xl ==null){
            $request->uk_xl = 'xl';
            $req = $request->uk_xl;
            $data = Seragam::where('ukuran' , 'like' , $req)->get();
        }

        return view('seragam.index' , compact('data'));
    }
}
