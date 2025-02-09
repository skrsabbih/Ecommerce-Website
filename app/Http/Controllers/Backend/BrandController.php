<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand; // Ensure the Brand model is imported
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'logo' => ['required', 'image', 'max:2000'], // Max size is 2MB
            'name' => ['nullable', 'string', 'max:200'],
            'is_featured' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        // Create a new Brand instance
        $brand = new Brand();

        // Handle file upload
        if ($request->hasFile('logo')) {
            $logoPath = $this->uploadImage($request, 'logo', 'uploads/brands'); // Updated folder for brands
            $brand->logo = $logoPath;
        }

        // Assign other fields
        $brand->name = $request->name;
        $brand->slug =Str::slug( $request->title);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        // Save the brand to the database
        $brand->save();

        // Show success message and redirect back
        toastr()->success('Brand created successfully!');
        return redirect()->back(); // Updated to redirect to the brand listing page
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
