<?php
namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();

        return view('home.admin.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:4',
            'divisi' => 'required',
            'umur' => 'required|numeric',
            'JK' => 'required',

        ]);

        Pegawai::create($request->all());
        return redirect()->route('home')
        ->with('success', 'Pegawai created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
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
        $pegawai = Pegawai::where('id', '=', $id)->firstOrFail();
        return view('home.admin.edit', compact('pegawai'));
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
      $request->validate([
        'nama' => 'required|min:4',
        'divisi' => 'required',
        'umur' => 'required|numeric',
        'JK' => 'required',
      ]);
      
      Pegawai::where('id', '=', $id)->update ([
        'nama' => $request->nama,
        'divisi' => $request->divisi,
        'umur' => $request->umur,
        'JK' => $request->JK,
      ]);
      return redirect()->route('home')->with('successUpdate', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::where('id', '=', $id)->delete();
        return redirect()->back()->with ('successDelete', 'Berhasil menghapus data!');
    }
}
