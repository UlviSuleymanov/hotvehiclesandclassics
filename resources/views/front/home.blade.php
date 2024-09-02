@extends(".layouts.front.layout")


@section("content")
    <!-- Hero Section Begin -->
    @include("front.inc.hero")
    <!-- Hero Section End -->

    <!-- Services Section Begin -->
    @include("front.inc.services")
    <!-- Services Section End -->

    <!-- Feature Section Begin -->
    @include("front.inc.feature")
    <!-- Feature Section End -->

    <!-- Car Section Begin -->
    @include("front.inc.car")
    <!-- Car Section End -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="chooseus__text">
                        <div class="section-title">
                            <h2>Why People Choose Us</h2>
                            <p>Duis aute irure dolorin reprehenderits volupta velit dolore fugiat nulla pariatur
                                excepteur sint occaecat cupidatat.</p>
                        </div>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</li>
                            <li><i class="fa fa-check-circle"></i> Integer et nisl et massa tempor ornare vel id orci.
                            </li>
                            <li><i class="fa fa-check-circle"></i> Nunc consectetur ligula vitae nisl placerat tempus.
                            </li>
                            <li><i class="fa fa-check-circle"></i> Curabitur quis ante vitae lacus varius pretium.</li>
                        </ul>
                        <a href="#" class="primary-btn">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="chooseus__video set-bg">
            <img src="{{asset('assets/img/chooseus-video.png')}}" alt="">
            <a href="https://www.youtube.com/watch?v=Xd0Ok-MkqoE"
               class="play-btn video-popup"><i class="fa fa-play"></i></a>
        </div>
    </section>
    <!-- Chooseus Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Blog</span>
                        <h2>Latest News Updates</h2>
                        <p>Sign up for the latest Automobile Industry information and more. Duis aute<br /> irure
                            dolorin reprehenderits volupta velit dolore fugiat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest__blog__item">
                        <div class="latest__blog__item__pic set-bg" data-setbg="assets/img/latest-blog/lb-1.jpg">
                            <ul>
                                <li>By Polly Williams</li>
                                <li>Dec 19, 2018</li>
                                <li>Comment</li>
                            </ul>
                        </div>
                        <div class="latest__blog__item__text">
                            <h5>Benjamin Franklin S Method Of Habit Formation</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                                facilisis.</p>
                            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest__blog__item">
                        <div class="latest__blog__item__pic set-bg" data-setbg="assets/img/latest-blog/lb-2.jpg">
                            <ul>
                                <li>By Mattie Ramirez</li>
                                <li>Dec 19, 2018</li>
                                <li>Comment</li>
                            </ul>
                        </div>
                        <div class="latest__blog__item__text">
                            <h5>How To Set Intentions That Energize You</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                                facilisis.</p>
                            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest__blog__item">
                        <div class="latest__blog__item__pic set-bg" data-setbg="assets/img/latest-blog/lb-3.jpg">
                            <ul>
                                <li>By Nicholas Brewer</li>
                                <li>Dec 19, 2018</li>
                                <li>Comment</li>
                            </ul>
                        </div>
                        <div class="latest__blog__item__text">
                            <h5>Burning Desire Golden Key Or Red Herring</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                                facilisis.</p>
                            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Cta Begin -->
    <div class="cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="cta__item set-bg" data-setbg="assets/img/cta/cta-1.jpg">
                        <h4>Do You Want To Buy A Car</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="cta__item set-bg" data-setbg="assets/img/cta/cta-2.jpg">
                        <h4>Do You Want To Rent A Car</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cta End -->



@endsection

