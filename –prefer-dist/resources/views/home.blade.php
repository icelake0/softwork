@extends('layouts.app')

@section('content')
<section id="home">
        <div class="home-pattern"></div>
        <div id="main-carousel" class="carousel slide" data-ride="carousel"> 
            <ol class="carousel-indicators">
                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-carousel" data-slide-to="1"></li>
                <li data-target="#main-carousel" data-slide-to="2"></li>
            </ol><!--/.carousel-indicators--> 
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/slide3.jpg)"> 
                    <div class="carousel-caption"> 
                        <div> 
                            <h2 class="heading animated bounceInDown">'Himu' Onepage HTML Template</h2> 
                            <p class="animated bounceInUp">Fully Professional one page template</p> 
                            <a class="btn btn-default slider-btn animated fadeIn" href="#">Get Started</a> 
                        </div> 
                    </div> 
                </div>
                <div class="item" style="background-image: url(images/slider/slide2.jpg)"> 
                    <div class="carousel-caption"> <div> 
                        <h2 class="heading animated bounceInDown">Get All in Onepage</h2> 
                        <p class="animated bounceInUp">Everything is outstanding </p> <a class="btn btn-default slider-btn animated fadeIn" href="#">Get Started</a> 
                    </div> 
                </div> 
            </div> 
            <div class="item" style="background-image: url(images/slider/slide1.jpg)"> 
                <div class="carousel-caption"> 
                    <div> 
                        <h2 class="heading animated bounceInRight">Fully Responsive Template</h2> 
                        <p class="animated bounceInLeft">100% Responsive HTML template</p> 
                        <a class="btn btn-default slider-btn animated bounceInUp" href="#">Get Started</a> 
                    </div> 
                </div> 
            </div>
        </div><!--/.carousel-inner-->

        <a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div> 

</section><!--/#home-->

    <section id="services" class="parallax-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="title-one">Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="our-service">
                        <div class="services row">
                            <div class="col-sm-4">
                                <div class="single-service">
                                    <i class="fa fa-th"></i>
                                    <h2>Modern Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-service">
                                    <i class="fa fa-html5"></i>
                                    <h2>Web Development</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-service">
                                    <i class="fa fa-users"></i>
                                    <h2>Online Marketing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                                </div>
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#service-->

        <section id="our-team">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="title-one">Meet The Team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                    </div>
                </div>
                <div id="team-carousel" class="carousel slide" data-interval="false">
                    <a class="member-left" href="#team-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="member-right" href="#team-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="carousel-inner team-members">
                        <div class="row item active">
                            <div class="col-sm-6 col-md-3">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="single-member">
                                    <img src="images/our-team/member2.jpg" alt="team member" />
                                    <h4>Alekjandra Jony</h4>
                                    <h5>Creative Designer</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>
                                    <div class="socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="single-member">
                                    <img src="images/our-team/member3.jpg" alt="team member" />
                                    <h4>Paul Johnson</h4>
                                    <h5>Skilled Programmer</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>
                                    <div class="socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
            <div class='col-sm-4 btn btn-link' data-toggle="modal" data-target="#reportFault " style='background-color:#3399FF; height:50px; margin-top:20px; text-align:center; font-size:20px; padding: 10px 10px 10px 10px;'><p><a style='color:#ffffff;'>Report A Phone Fault</a></p></div>
            <div class='col-sm-4 btn btn-link' data-toggle="modal" data-target="#reportFault " style='background-color:#FF5050; height:50px; margin-top:20px; text-align:center; font-size:20px; padding: 10px 10px 10px 10px;'><p><a style='color:#ffffff;'>Report A Computer Fault</a></p></div>
            <div class='col-sm-4 btn btn-link' style='background-color:#33CC33; height:50px; margin-top:20px; text-align:center; font-size:20px; padding: 10px 10px 10px 10px;'><p><a style='color:#ffffff;'>Consult For Electronics Designe</a></p></div>
            </div>
        </section><!--/#Our-Team-->
@endsection