<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Books/Index', [
            'books' => Book::query()->paginate(5, [
                'id',
                'title',
                'author',
            ]),
        ]);
    }

    /**
     * @param Book $book
     * @return Response
     */
    public function show(Book $book): Response
    {
        return Inertia::render('Books/Show', [
            'book' => $book->only([
                'id',
                'title',
                'author',
            ]),
        ]);
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Books/Create');
    }

    /**
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'title'  => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
        ]);

        Book::create($attributes);

        return redirect()->route('books.index');
    }

    /**
     * @param Book $book
     * @return Response
     */
    public function edit(Book $book): Response
    {
        return Inertia::render('Books/Edit', [
            'book' => $book->only([
                'id',
                'title',
                'author',
            ]),
        ]);
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(Book $book, Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'title'  => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
        ]);

        $book->update($attributes);

        return redirect()->route('books.show', $book->id);
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
