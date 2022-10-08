<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    // protected $table = 'tb_data';
    // protected $primaryKey = "id";
    // protected $fillable = [
    //     'id', 'tahun', 'luas_tanam', 'luas_panen', 'produktivitas', 'produksi', 'id_kabupaten', 'id_kecamatan',
    // ];

    public function messages()
    {
        // return $this->hasMany("App\Models\ChatMessage");
        return $this->hasMany(ChatMessage::class);
    }
}
