<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::latest()->paginate(5);

        return view ('note.index', compact('notes'))
        ->with('i', (request()->input('page', 1)-1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('note.create');
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
            'date'=>'required',
            'time'=>'required',
            'note'=>'required',
            'suhu'=>'required',
        ]);
        Note::create($request->all());

        return redirect()->route('note.index')
                        ->with('succes', 'berhasil menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  s
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'date'=>'required',
            'time'=>'required',
            'note'=>'required',
            'suhu'=>'required',
        ]);
        $note->update($request->all());

        return redirect()->route('note.index')
                        ->with('succes', 'berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('note.index')
                ->with('success', 'Berhasil Hapus');
    }
}
