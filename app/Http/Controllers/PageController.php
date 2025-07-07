<?php
namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(?string $slug = 'index'): View
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('page', compact('page'));
    }
}
