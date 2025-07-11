<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'type', 'data', 'order'];

    protected $casts = [
        'data' => 'array',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

