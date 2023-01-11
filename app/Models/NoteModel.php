<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory;
    protected $table = "motivasi";
    protected $fillable = [
        'id',
        'isi_motivasi',
        'iduser',
    ];
    public $timestamps = true;

    public function getNotes()
    {
        $getNotes = NoteModel::select('users.*', 'motivasi.*')
            ->join('users', 'motivasi.iduser', '=', 'users.id')
            ->orderBy('motivasi.id', 'desc')
            ->get();
        return $getNotes;
    }
}
