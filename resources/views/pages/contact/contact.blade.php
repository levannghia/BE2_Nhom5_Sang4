@section('title')
    Liên hệ
@endsection
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{asset('/')}}">trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>liên hệ</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact area start-->
<div class="contact_area">
    @php
        $message = Session::get('message');
        if ($message) {
            echo '<p class="text-alert">'.$message.'</p>';
            Session::put('message',null);
        }
    @endphp
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="contact_message">
                    <h3>Gửi góp ý</h3>   
                    <form id="contact-form" method="POST" action="{{asset('/goi-loi-nhan')}}">
                        @csrf
                        <div class="row">
                            
                            <div class="col-12">
                                <input name="email" placeholder="Email *" type="email">    
                            </div>
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name *" type="text">    
                            </div>
                             <div class="col-lg-6">
                                <input name="phone" placeholder="Phone *" type="text">   
                            </div>

                            <div class="col-12">
                                <div class="contact_textarea">
                                    <textarea placeholder="Message *" name="message" class="form-control2"></textarea>     
                                </div>   
                                <button type="submit"> Gửi </button>  
                            </div> 
                            <div class="col-12">
                                <p class="form-messege">
                            </div>
                        </div>
                    </form>    
                </div> 
           </div>
          
           <div class="col-lg-6 col-md-12">
               <div class="contact_message contact_info">
                    <h3>liên hệ</h3>    
                     <p>Hãy cho chúng tôi biết bạn cần gì để chúng tôi có thể phục vụ bạn tốt hơn</p>
                    <ul>
                        <li><i class="fa fa-fax"></i>  Địa chỉ: 53 Võ Văn Ngân - Phường Linh Chiểu - Quận Thủ Đức - Thành phố Hồ Chí Minh</li>
                        <li><i class="fa fa-phone"></i> <a href="#">thanhphat147@gmail.com</a></li>
                        <li><i class="fa fa-envelope-o"></i> 097 1174 293</li>
                    </ul>        
                    <h3><strong>Giờ làm việc</strong></h3>
                    <p><strong>Các ngày trong tuần (kể cả ngày nghỉ, lễ) </strong>:  08AM – 22PM</p>       
                </div> 
           </div>
       </div>
</div>

<!--contact area end-->

<!--contact map start-->
<div class="contact_map">
    <div class="row">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.474909812766!2d106.75587541533442!3d10.85143776077056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIG5naOG7hyBUaOG7pyDEkOG7qWM!5e0!3m2!1svi!2s!4v1623299177372!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!--contact map end-->

@endsection
@include('layouts.master')