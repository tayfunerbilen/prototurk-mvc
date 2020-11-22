<?php

namespace Prototurk\App\Controllers;

use Prototurk\App\Models\Article;
use Prototurk\Core\Database;

class Articles
{

    public function index()
    {
        $articles = model('article');
        return view('articles', [
            'articles' => $articles->getAll()
        ]);
    }

    public function detail($url)
    {
        $articles = model('article');
//        return view('article', [
//            'article' => $article
//        ]);

        return view('article', (array) $articles->find($url));
    }

}