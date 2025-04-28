<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['sub_materi_id', 'user_id', 'message', 'parent_id'];

    public function subMateri()
    {
        return $this->belongsTo(SubMateri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Discussion::class, 'parent_id');
    }
}
