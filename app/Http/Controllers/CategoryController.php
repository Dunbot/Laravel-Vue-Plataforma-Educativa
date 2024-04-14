<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Response;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        define('NUMBER_OF_ITEMS_PER_PAGE',25) ;
        $categories = Category::paginate(NUMBER_OF_ITEMS_PER_PAGE); #Paginate 25 Max
        return inertia('Categories/Index',['categories' => $categories]); #This will be linked with Resources/js/Pages/Categories/Index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     * Custom Request
     * 
     * @param App\Http\Requests\CategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //Make custom validation with artisan request
        Category::create($request->validated());
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category )
    {
        return inertia('Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Http\Requests\CategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');

    }
}
