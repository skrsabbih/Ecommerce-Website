@extends('admin.layouts.master')

@section('content')
   <!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Vendor Profile</h1>
      </div>

      <div class="section-body">
   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Vendor Profile</h4>
              </div>
              <div class="card-body">
               <form action="{{ route('admin.vendor-profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              

                <!-- Banner -->
                <div class="form-group">
                    <label>Banner</label>
                    <input type="file" class="form-control" name="banner">
                   
                   
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                   
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                  
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="summernote" name="description"></textarea>
                   
                </div>

                <!-- Facebook Link -->
                <div class="form-group">
                    <label>Facebook Link</label>
                    <input type="text" class="form-control" name="fb_link" value="{{ old('fb_link') }}">
                   
                </div>

                <!-- Twitter Link -->
                <div class="form-group">
                    <label>Twitter Link</label>
                    <input type="text" class="form-control" name="tw_link" value="{{ old('tw_link') }}">
                  
                </div>

                <!-- Instagram Link -->
                <div class="form-group">
                    <label>Instagram Link</label>
                    <input type="text" class="form-control" name="instra_link" value="{{ old('instra_link') }}">
                   
                </div>
                

                <button type="submit" class="btn btn-primary">Update</button>
               </form>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </section>
  
@endsection
