<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::approved()->latest()->take(6)->get();
        $featuredTutors = User::where('role', 'tutor')
            ->where('is_active', true)
            ->where('is_suspended', false)
            ->latest()
            ->take(6)
            ->get();

        return view('home.index', compact('articles', 'featuredTutors'));
    }

    public function articles()
    {
        $articles = Article::approved()->latest()->paginate(12);
        return view('home.articles', compact('articles'));
    }

    public function articleDetail(Article $article)
    {
        $article->increment('views');
        return view('home.article_detail', compact('article'));
    }

    public function tutors()
    {
        $tutors = User::where('role', 'tutor')
            ->where('is_active', true)
            ->where('is_suspended', false)
            ->latest()
            ->paginate(12);
        
        return view('home.tutors', compact('tutors'));
    }

    public function tutorDetail(User $tutor)
    {
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        $articles = $tutor->articles()->approved()->latest()->get();
        return view('home.tutor_detail', compact('tutor', 'articles'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }
}