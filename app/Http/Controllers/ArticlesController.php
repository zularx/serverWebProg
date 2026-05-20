<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function show($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();

        $author = DB::table('users')
            ->where('id', $article->author_id)
            ->first();

        return view('article', [
            'article' => $article,
            'author' => $author
        ]);
    }
}
