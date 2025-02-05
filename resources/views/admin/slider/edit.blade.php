@extends('admin.layouts.master')
@section('content')
   <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- This is necessary for updating data -->

                                <!-- Banner Preview -->
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200px" src="{{ asset($slider->banner) }}" alt="Banner">
                                </div>

                                <!-- Banner Upload -->
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>

                                <!-- Type -->
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ $slider->type }}">
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                </div>

                                <!-- Starting Price -->
                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price" value="{{ $slider->starting_price }}">
                                </div>

                                <!-- Button URL -->
                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{ $slider->btn_url }}">
                                </div>

                                <!-- Serial -->
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $slider->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $slider->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
