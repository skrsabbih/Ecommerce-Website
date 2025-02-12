<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand; 
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
        $brand->slug =Str::slug( $request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        // Save the brand to the database
        $brand->save();

        // Show success message and redirect back
        toastr('Brand created successfully!');
        return redirect()->route('admin.brand.index'); // Updated to redirect to the brand listing page
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validate the request data
    $request->validate([
        'logo' => ['nullable', 'image', 'max:2000'], // Logo is optional, max size is 2MB
        'name' => ['nullable', 'string', 'max:200'],
        'is_featured' => ['required', 'boolean'],
        'status' => ['required', 'boolean'],
    ]);

    // Find the brand by ID
    $brand = Brand::findOrFail($id);

    // Handle file upload if a new logo is provided
    if ($request->hasFile('logo')) {
        
        // Upload the new logo
        $logoPath = $this->updateImage($request, 'logo', 'uploads/brands');
        $brand->logo = $logoPath;
    }

    // Assign other fields
    $brand->name = $request->name;
    $brand->slug = Str::slug($request->name);
    $brand->is_featured = $request->is_featured;
    $brand->status = $request->status;

    // Save the updated brand to the database
    $brand->save();

    // Show success message and redirect back
    toastr('Brand updated successfully!');
    return redirect()->route('admin.brand.index'); // Redirect to the brand listing page
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        
        // Delete the associated banner image
        $this->deleteImage($brand->logo);
        
        // Delete the slider record
        $brand->delete();
        
        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Delated successfully.'
        ]);
    }
    public function changeStatus(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status === 'true' ? 1 : 0;
        $brand->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Status has been updated!',
        ]);
    }
}
