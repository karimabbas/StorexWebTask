<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function upload_image($file, $prefix)
    {

        if ($file) {
            // $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $file->extension();
            $image = "storage/movie/" . $imageName;
            $file->move(public_path('storage/movie'), $imageName);
            $getValue = $image;

            return $getValue;
        }
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $Movies = Movie::with('category')
        ->filter($request->query())
        ->latest()->paginate(4);

        return view('dashboard.movies.index', compact('Movies','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $Movie = new Movie();
        return view('dashboard.movies.create', compact('Movie','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $data = $request->except('image');
        $path = $this->upload_image($request->file('image'),'movie_');
        $data['image'] = $path;

        Movie::create($data);

        return Redirect::route('dashboard.movies.index')->with('success', 'new Movie created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Movie = Movie::findOrFail($id);

        return view('dashboard.movies.show',compact('Movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $Movie = Movie::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.movies.index')->with('info', 'Record not found');
        }
        $categories = Category::all();

        return view('dashboard.movies.edit', compact('Movie','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        $category = Movie::find($id);

        $old_image = $category->image;

        $data = $request->except('image');
        $path = $this->upload_image($request->file('image'),'movie_');
        if ($path) {
            $data['image'] = $path;
        }

        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $category->update($data);

        if ($old_image && $path) {
            Storage::disk('public')->delete($old_image);
        }
        // $category->update($request->all());

        return Redirect::route('dashboard.movies.index')
            ->with('warning', 'Movie Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return Redirect::route('dashboard.movies.index')
            ->with('danger', 'Movie Deleted!');
    }
}
