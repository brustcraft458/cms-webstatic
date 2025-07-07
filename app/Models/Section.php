<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'background', 'order'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class)->orderBy('order');
    }
}
