<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }
}
