@extends('layouts.default')
@section('content')
        <!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
        {{--<div class="container">--}}
        {{--<h1>a </h1>--}}
        {{--<h2> b</h2>--}}
        {{--</div>--}}
    </div>
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">
        {{--<div class="row">--}}
            {{--<div class="col-lg-12 text-center">--}}
                {{--<h2 class="featurette-heading">"...supporting those who protect us!"</h2>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@include('partials.imagerow')--}}
        <hr class="featurette-divider">
        <div class="col-lg-12">
            <!-- First Featurette -->
            <div id="about"></div><br><br>
            <div class="featurette">
                <img class="featurette-image img-circle img-responsive pull-left" src="/img/vet_gun_and_flag.jpg" style="width: 400px;">
                <h2 class="featurette-heading">Freedom Is Not Free!
                    <span class="text-muted">If it wasn’t for our military,</span>
                </h2>
                <p class="lead">
                    our stars and stripes would not be flying. Our veterans have defended us and our freedom time and time again! The fact is we owe it all to our men and women in uniform.<br>
                    Help us honor our veterans, help us speak up about the greatness of America, and help us preserve the Constitution, which is what sets us free and what our veterans have fought and died for.
                {{--<br>Four words say it all:  <span class="sticker-red strong">GOD BLESS</span> <span class="sticker-blue strong">ALL COPS!</span>--}}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="featurette-divider">
        <div class="col-lg-12">
            <!-- 2nd Featurette -->
            <div id="mission"></div><br><br>
            <div class="featurette">
                <img class="featurette-image img-circle img-responsive pull-right" src="/img/vet_carrying_wounded.jpg">
                <h2 class="featurette-heading">Mission:  Honor Our Heroes.
                    <span class="text-muted">Many of us forget</span>
                </h2>
                <p class="lead">
                the price our servicemen and women must often pay in the line of duty.
                Tragically, it's not uncommon to see them come home bearing unimaginable wounds that will force them to face daunting, new challenges.
                <br>Our mission is to remind all people of our veteran's sacrifice...and help spark that fire of patriotism waiting in every American's heart!
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="featurette-divider">
        <div class="row">
            <div class="col-sm-12">
                <div class="featurette">
                    <img class="featurette-image img-circle img-responsive pull-left" src="/img/FatherGabriel.jpg" style="width: 400px;">
                    <h2 class="featurette-heading">I'm Father Gabriel Farago,
                        <span class="text-muted">founder of GOD BLESS OUR VETS!</span>
                    </h2>
                    <p class="lead">
			I still get misty-eyed whenever I see 'Old Glory' pass by.  I love America!  Recently, I created a bumper sticker as a statement of support for our veterans.  Made of premium vinyl, they're only $0.99 apiece -- with big discounts for bulk orders!  Our vets have always been there for us.  Please join me in displaying our support for them!
  		    </p>
                    <p style="text-align: right;">
                        <img src="/img/GBOVets_sticker.jpg" border="1" height="200px" class="sticker" style="border: 1px solid gray">
                    </p>
                    <p style="text-align: right;">
			<span style="font-size: 12px;">Bumper stickers are removable, glossy vinyl measuring 2.75" x 8.5" &nbsp; &nbsp;</span>
                    </p>
                </div>
            </div>
<!--
            <div class="col-md-2">
                <div class="row">
                    <div class="col-sm-12 sidebar">
                        <h3>T-Shirts <a href="https://godblessourvets.org/orders"><span class="label label-default">New</span></a></h3>
                        <p style="text-align: center;">
                            Wear your Support!<br>
                            High quality cotton.
                        </p>
                        <p>
                            <img src="/img/GBOV_tshirt_front.jpg" border="1" height="65px" class="imageheight">
                            <img src="/img/GBOV_tshirt_back.jpg" border="1" height="65px" class="imageheight">
                        </p>
                        <p>
                            <button class="btn btn-sm btn-default" style="align-content: center; width: 100%;"><a href="https://godblessourvets.org/orders">Buy Now</a></button>
                        </p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 sidebar2">
                        <p style="text-align: center;">
                            Show your Support!<br>
                            High quality vinyl.
                        </p>
                        <p style="text-align: center;">
                            <img src="/img/GBOVets_sticker.jpg" border="1" height="45px" class="imageheight">
                        </p>
                        <p>
                            <button class="btn btn-sm btn-default" style="align-content: center; width: 100%;"><a href="https://godblessourvets.org/orders">Buy Now</a></button>
                        </p>
                    </div>
                </div>
            </div>
-->
        </div>
    </div>
    <br>
    <div class="row" style="background-color: whitesmoke;">
        <div class="col-sm-12">
	    <h2>The bumper sticker above carries a powerful, up-lifting message!</h2>
	    <p class="lead">
		Printed on removable, glossy vinyl -- 2.75" x 8.5" -- this eye-catching item is "made in the USA" and
		promises <em>unlimited uses</em>, including:
	    </p>
	    <p class="lead">
		<strong><em>
			&#8226; fundraising  &nbsp; &#8226; media publicity &nbsp; &#8226; promoting membership in veterans organizations &nbsp; &#8226; events<br>
			&#8226; commemorations (Veteran's Day, &nbsp;Memorial Day, &nbsp;4th of July) &nbsp; &#8226; Thanksgiving &nbsp; &#8226; Christmas
		</em></strong>
	    </p>
	    <p class="lead">
		and at <em><strong>only .50 apiece</strong></em> -- for military only -- these patriotic stickers are even affordable as 'giveaways!'  Let's show our support to all who have served!
	    </p>
	    <p class="lead" style="text-align: center;">
		No payment up front.  Call or email to order! &nbsp;  (615) 944-2230 &nbsp; &#8226;  &nbsp;<a href="mailto:info@GodBlessOurVets.org">info@GodBlessOurVets.org</a>
	    </p>
	</div>
    </div>
    <br>
    <div class="row">
        <hr class="featurette-divider">
        <div class="col-sm-12">
            <section class="last">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Freedom is our responsibility to maintain and pass along.</h2><br>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="/img/President_Reagan.jpg" width="100px" alt="God Bless President Ronald Reagan">
                            </div>
                            <div class="col-sm-6">
                                <cite>
                                    Freedom is never more than one generation away from extinction. We didn't pass it to our children in the bloodstream. It must be fought for, protected, and handed on for them to do the same.
                                    <br> -- President Ronald Reagan
                                </cite>
                            </div>
                        </div>
                        <hr width="50%">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-2">
                                <cite>
                                    “As we express our gratitude, we must never forget that the highest appreciation is not to utter words, but to live by them.” <br> — President John F. Kennedy
                                </cite>
                            </div>
                            <div class="col-sm-2">
                                <img src="/img/President_Kennedy.jpg" width="100px" alt="God Bless President John Kennedy">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <section class="last">
                            <h4 style="color: red;">Hail The American Soldier</h4>
                            <audio controls autoplay>
                                <source src="/files/Hail_The_American_Soldier.mp3" type="audio/mpeg">
                            </audio>
		  	    <br>
                            <img src="/img/honoring-veterans-day_7_1.jpg" width="300px">
                            <br><br><img src="/img/five-branches.jpeg" width="300px" border=0>
                            <br><br>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- <hr class="featurette-divider"> -->

</div>
<!-- /.container -->
@stop


