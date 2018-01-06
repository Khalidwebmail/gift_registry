    


<footer id="footer" class="footer-area footer-2">
            <div class="footer-top footer-top-2 text-center ptb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer-logo">
                                <img src="{{asset('frontend/img/logo/logo.png')}}" alt="">
                            </div>
                            <ul class="footer-menu-2">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Pages</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>                                                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom footer-bottom-2 text-center gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="copyright-text copyright-text-2">
                                <p>&copy; <a href="#" target="_blank">CodeCarnival</a> 2016. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <ul class="footer-social footer-social-2">
                                <li>
                                    <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <ul class="footer-payment">
                                <li>
                                    <a href="#"><img src="{{asset('frontend/img/payment/1.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/img/payment/2.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/img/payment/3.jpg')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/img/payment/4.jpg')}}" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->










<!-- Placed JS at the end of the document so the pages load faster -->
   @if($pageInfo[2] != 'rating')
    <!-- jquery latest version -->
   <script src="{{asset('frontend/js/vendor/jquery-3.1.1.min.js')}}"></script>
   @endif
    <!-- Bootstrap framework js -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('frontend/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>
