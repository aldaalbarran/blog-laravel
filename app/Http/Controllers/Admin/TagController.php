<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = [
            '#4b5563' => 'Color gris',
            '#dc2626' => 'Color rojo',
            '#ca8a04' => 'Color amarillo',
            '#16a34a' => 'Color verde',
            '#2563eb' => 'Color azul',
            '#4f46e5' => 'Color indigo',
            '#9333ea' => 'Color morado',
            '#db2777' => 'Color rosado'
        ];

        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', "unique:tags"],
            'color' => ['required']
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index', $tag)->with('info', 'La etiqueta se creó con éxito.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = [
            '#4b5563' => 'Color gris',
            '#dc2626' => 'Color rojo',
            '#ca8a04' => 'Color amarillo',
            '#16a34a' => 'Color verde',
            '#2563eb' => 'Color azul',
            '#4f46e5' => 'Color indigo',
            '#9333ea' => 'Color morado',
            '#db2777' => 'Color rosado'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', "unique:tags,slug,$tag->id"],
            'color' => ['required']
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se eliminó con éxito.');
    }
}