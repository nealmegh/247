<section class="container-fluid footer-section-space section-bg-1" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-6 col-sm-6 col-xs-12 common-res-bottom-1">
                <h4 class="left contact-heading-bottom">contact</h4>

                <div class="contact-div">
                    <form id="contact" method="POST" action="{{ route('contact') }}">
                        @csrf
                        <div class="clearfix">
                            <!--================= NAME INPUT BOX HERE ====================-->
                            <div class="form-div form-bottom-1">
                                <input class="form-control form-text" id="name" type="text" name="name" value="" placeholder="Please Enter Name" required />
                            </div>

                            <!--================= EMAIL INPUT BOX HERE ====================-->
                            <div class="form-div form-bottom-1">
                                <input class="form-control form-text" id="email" type="email" name="email" value="" placeholder="Please Enter Email" required />
                            </div>

                            <!--================= MESSAGE INPUT BOX HERE ====================-->
                            <div class="form-div-1">
                                <textarea class="form-control form-text" id="message" name="message" placeholder="Message" rows="4" required></textarea>
                            </div>

                            <div class="distab submit-reset">
                                <!--================= SUBMIT BUTTON HERE ====================-->
                                <div class="distab-cell-middle submit-right-pad">
                                    <input type="submit" class="btn-1" id="submit" name="submit" value="SUBMIT">
                                </div>

                                <!--================= RESET BUTTON HERE ====================-->
                                <input type="reset" class="btn-1 distab-cell-middle cancel" name="clear" value="RESET">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="right form-error-top" id="messageDiv"> <span class="form-success" id="sucessMessage"> </span> <span class="form-failure" id="failMessage"> </span>
                </div>
            </div>

            <div class="col-md-6 col-md-pull-6 col-sm-6 col-xs-12">
                <h4 class="center h4-bottom">address</h4>
                <p class="center ls adress-line-bottom">{{$siteSettings[3]->value}} </p>
                <p class="center footer-row-space ls">{{$siteSettings[6]->value}}</p>

                <h4 class="center h4-bottom">Email </h4>
                <p class="center footer-row-space ls"> <a href="#">{{$siteSettings[4]->value}}</a>
                </p>

                <h4 class="center h4-bottom">phone no</h4>
                <p class="center footer-row-space ls"> {{$siteSettings[5]->value}} </p>

                <h4 class="center follow-heading-bottom">follow us</h4>
                <div class="center">
                    <ul class="no-padding no-margin footer-icon footer-left-pad">
                        <li>
                            <a href="https://www.facebook.com/{{$siteSettings[1]->value}}">
                                <img src="{{asset('images/2Frontend/32x32x4.png')}}" alt="icon" />
                            </a>
                        </li>

                        {{--<li>--}}
                        {{--<a href="https://g.co/kgs/bU3imK">--}}
                        {{--<img src="{{asset('images/2Frontend/32x32x5.png')}}" alt="icon" />--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<img src="{{asset('images/2Frontend/32x32x6.png')}}" alt="icon" />--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<img src="{{asset('images/2Frontend/32x32x7.png')}}" alt="icon" />--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<img src="{{asset('images/2Frontend/32x32x8.png')}}" alt="icon" />--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>

        </div>
        <div class="footer-br footer-br-bottom"></div>
        <p class="center ls"> Click here for <a href="{{route('terms')}}" style="color: #00ad5f ">Terms and Privacy Policy</a>
        </p>
        <!-- <p class="center ls">  <a href="#" style="color: #00ad5f "><img alt="Payment Methods" style="width:220px"  src="{{asset("images/paypal.jpeg")}}"  /></a><a href="https://tph.tfl.gov.uk/TfL/SearchOperatingCentre.page?org.apache.shale.dialog.DIALOG_NAME=TPHOperatingCentre&Param=lg2.TPHOperatingCentre&menuId=9" style="color: #00ad5f "><img alt="TFL" style="width:220px"  src="{{asset("images/TFL.jpg")}}"  /></a> </p> -->
{{--        <p class="center ls">  <a href="{{route('terms')}}" style="color: #00ad5f "><img alt="Logo" style="width:220px"  src="{{asset("images/logo1.png")}}"  /></a> </p>--}}
        <p class="center ls">© 2019, All Rights Reserved, owned by Samif Ltd, Reg no 08926867</p>

    </div>
</section>
