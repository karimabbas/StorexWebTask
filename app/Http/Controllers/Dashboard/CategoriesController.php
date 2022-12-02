<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::latest()->paginate(4);
        return view('dashboard.categories.index',compact('categories'));

    }


    public function create()
    {
        // if (Gate::denies('categories.create')) {
        //     abort(403);
        // }
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }

    public function store(CategoryRequest $request)
    {

        $data['title'] = $request->title;
       Category::create($data);

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category created!');
    }


    public function show(Category $category)
    {
        // if (!Gate::allows('categories.view')) {
        //     abort(403);
        // }

        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.categories.index')->with('info', 'Record not found');
        }
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        // Gate::authorize('categories.update');

        $category = Category::find($id);
        $data['title'] = $request->title;
        $category->update($data);

        return Redirect::route('dashboard.categories.index')
            ->with('warning', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('dashboard.categories.index')
            ->with('danger', 'Category Deleted!');
    }

}
