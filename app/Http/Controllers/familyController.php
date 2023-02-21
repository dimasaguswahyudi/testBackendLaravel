<?php

namespace App\Http\Controllers;

use App\Models\family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class familyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = family::all();
        return view('pages.index', compact('data'));
    }

    public function listquery()
    {
        $data = family::with('child')->first();
        return view('pages.query', compact('data'));
    }
    public function chart()
    {
        $data = family::with('child')->first();

        $family = [];
        foreach ($data->child as $key => $value) {
            $family[] = [$data->name , $value->name];
        }
        foreach ($data->child as $key => $value) {
            $family = $this->getFamily($value, $family);
        }
        return view('pages.chart', compact('family'));
    }

    public function getFamily($art, $family)
    {
        $data = family::where('id_parent', $art->id)->get();
        foreach ($data as $key => $value) {
            $family[] = [$art->name, $value->name];
        }
        return $family;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data'] = new family;
        $data['jenis_kelamin'] = ['P','L'];
        $data['parent'] = family::all();
        return view('pages.create_edit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_parent' => 'nullable',
            'name' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        DB::beginTransaction();
        try {
            family::create($validated);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Menambah Data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('danger', 'Gagal Menambah Data');
        }
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
        $data['data'] = family::find($id);
        $data['jenis_kelamin'] = ['P','L'];
        $data['parent'] = family::all();
        return view('pages.create_edit', compact('data'));
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
        $validated = $request->validate([
            'id_parent' => 'nullable',
            'name' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        DB::beginTransaction();
        try {
            family::find($id)->update($validated);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Menambah Data');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('danger', 'Gagal Menambah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        family::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus');
    }
}
