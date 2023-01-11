<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteModel;
use Validator;

class Note extends Controller
{
    protected $modelNotes;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->modelNotes = new NoteModel();
    }
    public function getNotes()
    {
        $getNotes = $this->modelNotes->getNotes();
        return response()->json(['success' => true, 'status' => 'created', 'notes' => $getNotes]);
    }
    public function saveNotes(Request $request)
    {
        $dataNotes = new NoteModel();
        $dataNotes->isi_motivasi    = $request->input('note');
        $dataNotes->iduser          = $request->input('iduser');
        $dataNotes->save();
        return response()->json([
            'status' => 'created',
            'success' => 'true',
            'data' => $dataNotes
        ], 201);
    }
    public function deleteNotes($id)
    {
        $deleteNotes = NoteModel::find($id);
        $deleteNotes->delete();
        return response()->json(['status' => 'deleted', 'success' => true]);
    }
}
