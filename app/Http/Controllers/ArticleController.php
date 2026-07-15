<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::approved()->latest()->paginate(12);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
        ]);

        $article = Article::create([
            'author_id' => Auth::id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'subject' => $validated['subject'] ?? null,
            'tags' => $validated['tags'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Artikel berhasil dikirim dan menunggu moderasi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($article->status !== 'approved' && (!Auth::check() || Auth::id() !== $article->author_id)) {
            abort(403);
        }

        $article->incrementViews();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (Auth::id() !== $article->author_id) {
            abort(403);
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (Auth::id() !== $article->author_id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
        ]);

        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'subject' => $validated['subject'] ?? null,
            'tags' => $validated['tags'] ?? null,
            'status' => 'pending', // Re-verify after edit
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Artikel berhasil diperbarui dan menunggu moderasi ulang.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->author_id && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
