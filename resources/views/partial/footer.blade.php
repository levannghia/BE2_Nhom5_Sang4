<!--footer area start-->
<br>
<div></div>
<div class="footer_area">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>About us</h3>
                        <p>Với hơn 30 năm kinh nghiệm trong lĩnh vực thực phẩm, chúng tôi tự tin sẽ làm hài lòng khách hàng - Farm Store</p>
                        <div class="footer_widget_contect">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ: 53 Võ Văn Ngân - Phường Linh Chiểu - Quận Thủ Đức - Thành phố Hồ Chí Minh</p>

                            <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> thanhphat147@gmail.com </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>Tài khoản của bạn</h3>
                        <ul>
                            <li><a href="{{ route('profile') }}">Xem thông tin</a></li>
                            <li><a href="{{ url('login') }}">Đăng nhập ngay</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>Informations</h3>
                        <ul>
                            <li><a href="{{asset('/show-all-product')}}">Our store(s)!</a></li>
                            <li><a href="{{asset('/lien-he')}}">About us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <ul>
                            <li><a href="{{asset('/lien-he')}}"> about us </a></li>
                            
                        </ul>
                        <p>Copyright &copy; 2018 <a href="#">Farm store</a>. All rights reserved. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_social text-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            
                            <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer area end-->






<!-- all js here -->
<script src="{{asset('js\vendor\jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('js\popper.js')}}"></script>
<script src="{{asset('js\bootstrap.min.js')}}"></script>
<script src="{{asset('js\ajax-mail.js')}}"></script>
<script src="{{asset('js\plugins.js')}}"></script>
<script src="{{asset('js\main.js')}}"></script>