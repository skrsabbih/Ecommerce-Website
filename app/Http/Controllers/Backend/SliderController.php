<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\DataTables\SliderDataTable;
use File;
class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
        //return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'banner' => ['required', 'image', 'max:2000'], // Max size is 2MB
            'type' => ['nullable', 'string', 'max:200'],
            'title' => ['required', 'string', 'max:200'],
            'starting_price' => ['nullable', 'string', 'max:200'],
            'btn_url' => ['nullable', 'url'],
            'serial' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);
    
        // Create a new Slider instance
        $slider = new Slider();
    
        // Handle file upload
        if ($request->hasFile('banner')) {
            $imagePath = $this->uploadImage($request, 'banner', 'uploads');
            $slider->banner = $imagePath;
        }
    
        // Assign other fields
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
    
        // Save the slider to the database
        $slider->save();
    
        // Show success message and redirect back
        toastr()->success('Slider created successfully!');
        return redirect()->back();
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', ['slider' => $slider]);

    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'], // Optional for updating
            'type' => ['nullable', 'string', 'max:200'],
            'title' => ['required', 'string', 'max:200'],
            'starting_price' => ['nullable', 'string', 'max:200'],
            'btn_url' => ['nullable', 'url'],
            'serial' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
        ]);
    
        // Find the slider or throw a 404 if not found
        $slider = Slider::findOrFail($id);
    
            
        // Upload the new image
        $imagePath = $this->updateImage($request, 'banner', 'uploads',$slider->banner);
        $slider->banner = $imagePath;
        
    
        // Update other fields
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
    
        // Save the updated slider
        $slider->save();
    
        // Show success message and redirect back
        toastr()->success('Slider updated successfully!');
        return redirect()->route('admin.slider.index'); // Redirect to index page (adjust route as needed)
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        
        // Delete the associated banner image
        $this->deleteImage($slider->banner);
        
        // Delete the slider record
        $slider->delete();
        
        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Image deleted successfully.'
        ]);
    }
    
}
