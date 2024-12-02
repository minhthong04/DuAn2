<main>
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Lifestyle</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @foreach ($recentNews as $news)
                                                @if ($loop->index <= 1)
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{ asset($news->image) }}" alt="">
                                                            </div>
                                                            <div class="whates-caption">
                                                                <h4><a href="latest_news.html">{{ $news->title }}</a>
                                                                </h4>
                                                                <span>by Alice cloe - Jun 19, 2020</span>
                                                                <p>{{ $news->content }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <!-- Right single caption -->

                                            @foreach ($recentNews as $news)
                                                @if ($loop->index > 1 && $loop->index <= 6)
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img src="{{ asset($news->image) }}"
                                                                            alt="" style="width: 124px">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span
                                                                            class="colorb">{{ $news->category->name }}</span>
                                                                        <h4><a
                                                                                href="latest_news.html">{{ $news->title }}</a>
                                                                        </h4>
                                                                        <p>{{ $news['created_at']->format('M, d, Y') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <!-- Banner -->
                    <div class="banner-one mt-20 mb-30">
                        <img src="{{ asset('frontend/assets/img/gallery/body_card1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('frontend/assets/img/news/icon-fb.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('frontend/assets/img/news/icon-tw.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('frontend/assets/img/news/icon-ins.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('frontend/assets/img/news/icon-yo.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Most Recent</h4>
                        </div>
                        <!-- Single -->
                        @foreach ($mostViewedPosts as $mostViewedPosts)
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="{{ asset($mostViewedPosts->image) }}" alt="" style="width: 85px">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="latest_news.html">{{ $mostViewedPosts->title }}</a>
                                    </h4>
                                    <p>{{ $news['created_at']->format('M, d, Y') }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="{{ asset('frontend/assets/img/gallery/body_card2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Most Popular</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weeklyNews1.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a>
                                                </h4>
                                                <p>Jhon | 2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weeklyNews2.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a>
                                                </h4>
                                                <p>Jhon | 2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weeklyNews3.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a>
                                                </h4>
                                                <p>Jhon | 2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weeklyNews2.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a>
                                                </h4>
                                                <p>Jhon | 2 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Trending News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="{{ asset('frontend/assets/img/gallery/tranding1.png') }}"
                                        alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">
                                            <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                    ations</a></h4>
                                        </a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video btn-icon"
                                        href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                            class="flaticon-play-button"></span></a>

                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="{{ asset('frontend/assets/img/gallery/tranding2.png') }}"
                                        alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                            ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                            class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="{{ asset('frontend/assets/img/gallery/tranding1.png') }}"
                                        alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">
                                            <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                    ations</a></h4>
                                        </a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                            class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="{{ asset('frontend/assets/img/gallery/tranding2.png') }}"
                                        alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                            ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span
                                            class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weekly2News1.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                        Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weekly2News2.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                        Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weekly2News3.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                        Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weekly2News4.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                        Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('frontend/assets/img/gallery/weekly2News2.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                        Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- banner-last Start -->
    <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="{{ asset('frontend/assets/img/gallery/body_card3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
</main>
