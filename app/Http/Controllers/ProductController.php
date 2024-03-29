<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use newrelic\DistributedTracePayload;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'name_en' => 'required|max:255',
            'description' => 'required|min:30',
            'description_en' => 'required|min:30',
            'price' => 'required|integer',
            'article' => 'required',
            'preview_image' => 'required|image',
            'images.*' => 'image',
            'collection_id' => 'required|integer',
            'status_id' => 'required',
            'color' => 'required',
            'color_en' => 'required',
            'count' => 'required',
            'care' => 'required',
            'care_en' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $image_path = null;

        if ($request->file('preview_image')) {
            $image_path = $request->file('preview_image')->store('public/images');
        }

        $product = Product::query()->create([
                'preview_image' => $image_path,
                'slug' => Str::slug($request->name) . '-' . uniqid(),
            ] + $validator->validated());

        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {
                $file = $file->store('public/images');

                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'image_url' => $file,
                ]);
            }
        }

        return redirect()->route('product-page', $product);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'name_en' => 'required|max:255',
            'description' => 'required|min:30',
            'description_en' => 'required|min:30',
            'price' => 'required|integer',
            'article' => 'required',
            'preview_image' => 'image',
            'images.*' => 'image',
            'collection_id' => 'required|integer',
            'status_id' => 'required',
            'color' => 'required',
            'color_en' => 'required',
            'count' => 'required',
            'care' => 'required',
            'care_en' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $image_path = $product->preview_image;

        if ($request->file('preview_image')) {
            $image_path = $request->file('preview_image')->store('public/images');
        }

        if ($request->file('images')) {
            ProductImage::query()->where('product_id', '=', $product->id)->delete();
            foreach ($request->file('images') as $file) {
                $file = $file->store('public/images');

                ProductImage::query()->create([
                    'product_id' => $product->id,
                    'image_url' => $file,
                ]);
            }
        }

        $product->update(['preview_image' => $image_path, 'slug' => Str::slug($request->name) .'-'. uniqid()] + $validator->validated());
        $product = Product::query()->where('id', '=', $product->id)->first();

        return redirect()->route('product-page', $product);
    }

    public function edit(Product $product)
    {
        $collections = Collection::all();
        $productStatuses = ProductStatus::all();
        return view('pages.product.update', [
            'product' => $product,
            'collections' => $collections,
            'productStatuses' => $productStatuses,
        ]);
    }

    public function show(Product $product)
    {
        return view('pages.product.product', compact('product'));
    }

    public function delete($id){
        Product::query()->where('id','=', $id)->delete();

        return redirect()->back();
    }
}
