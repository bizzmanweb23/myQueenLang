<footer class="footer">
    <div class="container">
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="widget widget-about">
                        <a href="{{ url('/') }}" class="logo-footer">
                            <img src="{{ asset('images/footer-logo.png') }}" alt="logo-footer" width="154"
                                height="43">
                        </a>
                        <div class="widget-body">
                            <p>Fringilla urna porttitor rhoncus dolor purus <br> luctus venenatis lectus magna
                                fringilla diam <br> maecenas ultricies mi eget mauris.
                            </p>
                            <a href="#">yourmail.com</a>
                        </div>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">@lang('auth.aboutus')</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="{{url('about')}}">@lang('auth.aboutus')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.order')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Returns')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Custom')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.terms')</a>
                                            </li>
                                        </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">@lang('auth.customer')</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="">@lang('auth.payment')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.money')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Returns')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.Custom')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.terms')</a>
                                            </li>
                                        </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="widget mb-0">
                                 <h4 class="widget-title">@lang('auth.account')</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="">@lang('auth.sign')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.View')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.wish')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.track')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('auth.help')</a>
                                            </li>
                                        </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Footer Middle -->
        <div class="footer-bottom">
            <div class="footer-left">
                <figure class="payment">
                    <img src="{{ asset('images/payment.png') }}" alt="payment" width="159" height="29">
                </figure>
            </div>
            <div class="footer-center">
                <p class="copyright">@lang('auth.ads')</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- Plugins JS File -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('js/main.min.js') }}"></script>

<script src="{{ asset('vendor/sticky/sticky.min.js') }}"></script>
<script src="{{ asset('vendor/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('alert/toastr.min.js') }}"></script>
@yield('javascript')


<script>

    function changeLanguage(lang){
		//sse.preventDefault();
		//alert(lang);
        window.location='{{url("change-language")}}/'+lang;
	}
	
    $(document).ready(function() {
        calculate_cart()
    });

    function calculate_cart() {
        $.ajax({
            url: "{{ URL::signedRoute('users.cart.create') }}",
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0)
                    $('#all_cart_count').html('(' + data.length + ')')
                else
                    $('#all_cart_count').html('')

            }
        })
    }
</script>

</body>

</html>
