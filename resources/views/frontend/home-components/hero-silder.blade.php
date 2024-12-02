<div class="trending-area fix pt-25 gray-bg">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="slider-active">
                        <!-- Single -->
                        @foreach ($heroSlider as $slider)
                            @if ($loop->index <= 4)
                                <div class="single-slider">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <!-- Cập nhật hình ảnh -->
                                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                                            <div class="trend-top-cap">
                                                <span class="bgr" data-animation="fadeInUp" data-delay=".2s"
                                                    data-duration="1000ms">
                                                    {{-- Lấy tên của danh mục từ bảng category --}}
                                                    {{ $slider->category ? $slider->category->name : 'Uncategorized' }}
                                                </span>
                                                <h2>
                                                    <a href="#" data-animation="fadeInUp" data-delay=".4s"
                                                        data-duration="1000ms">{{ $slider->title }}</a>
                                                </h2>
                                                <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">
                                                    by {{ $slider->author ?? 'Unknown Author' }} -
                                                    {{ $slider->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4">
                    <!-- Trending Top -->
                    <div class="row">
                        @foreach ($heroSlider as $slider)
                            @if ($loop->index > 4 && $loop->index <= 6)
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <!-- Cập nhật hình ảnh -->
                                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                                            <div class="trend-top-cap trend-top-cap2">
                                                <span class="bgb">
                                                    {{-- Lấy tên của danh mục từ bảng category --}}
                                                    {{ $slider->category ? $slider->category->name : 'Uncategorized' }}
                                                </span>
                                                <h2>
                                                    <a href="#">
                                                        {{ $slider->title }}
                                                    </a>
                                                </h2>
                                                <p>
                                                    by {{ $slider->author ?? 'Unknown Author' }} -
                                                    {{ $slider->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
