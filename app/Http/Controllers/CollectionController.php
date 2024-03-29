<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('pages.all-collection', [
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_en' => 'required',
            'text' => '',
            'text_en' => '',
        ]);

        $validated = $validator->validated();

        Collection::create($validated);

        return redirect()->back();
    }

    public function show(Collection $collection)
    {
        return view('pages.collection', compact('collection'));
    }

    public function update(Request $request, Collection $collection)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_en' => 'required',
            'text' => '',
            'text_en' => '',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();

        Collection::query()->where('id', $collection->id)->update($validated);

        return redirect()->route('admin-page');
    }

    public function edit(Collection $collection){
        return view('admin.collection-update', ['collection' => $collection]);
    }

    public function delete(Collection $collection)
    {
        $collection->delete();
    }
}
