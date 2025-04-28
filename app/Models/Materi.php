<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi'];

    public function subMateris()
    {
        return $this->hasMany(SubMateri::class);
    }
}
