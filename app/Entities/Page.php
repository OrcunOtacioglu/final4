<?php

namespace App\Entities;

use Acikgise\Helpers\Helpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'excerpt',
        'content'
    ];

    public static function createNew(Request $request)
    {
        $page = new Page();

        $page->title = $request->title;
        $page->slug = Helpers::generateSlug($request->title);

        $page->status = $request->status;
        $page->excerpt = $request->excerpt;
        $page->body = $request->body;

        $page->created_at = Carbon::now();
        $page->updated_at = Carbon::now();

        $page->save();

        return $page;
    }

    public static function updateEntity(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $page->title = $request->title;
        $page->slug = $request->slug != null ? $request->slug : $page->slug;

        $page->status = $request->status;
        $page->excerpt = $request->excerpt;
        $page->body = $request->body;

        $page->updated_at = Carbon::now();

        $page->save();

        return $page;
    }
}
