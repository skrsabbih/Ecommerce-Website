<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ($sliders as $slider)
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background-image: url('{{ asset($slider->banner) }}');">
                                <div class="wsus__single_slider_text">
                                    <h3 class="slider-subtitle">{{ $slider->type ?? 'Default Type' }}</h3>
                                    <h1 class="slider-title">{{ $slider->title ?? 'Default Title' }}</h1>
                                    <h6 class="slider-price">
                                        Start at ${{ $slider->starting_price }}
                                    </h6>
                                    <a class="common_btn" href="{{ $slider->btn_url ?? '#' }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>