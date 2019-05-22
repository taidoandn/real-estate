@component('mail::message')
# Chào, {{ $post->user->name }}
@component('mail::panel')
# Cảm ơn bạn đã đăng tin bất động sản tại công ty chúng tôi.<br>
Thời gian đăng tin bắt đầu vào {{ $post->start_date }} và đến hết ngày {{ $post->end_date }}
<br>
#Số ngày : {{ $date_diff }} ngày
<br>
#Loại <strong>{{ $post->type->name }}</strong> : {{ number_format($post->type->price,0,",",".") }} đồng / ngày
<br>
#Bạn cần thanh toán trước khi thời gian đưa tin bắt đầu trước ít nhất 1 ngày.
<br>
#Vui lòng thanh toán vào <br>
#Số tài khoản : 0041000250743 <br>
#Ngân hàng : Vietcombank <br>
#Chủ TK: Ngô Đình Dũng trụ sở Đà Nẵng với nội dung: #P-{{ $post->id }} {{ $post->user->email }}
@endcomponent

@component('mail::table')
| Phí đăng tin                               | VAT(10%)                                 | Thành tiền                                        |
| :-------------:                            |:-------------:                           | :--------:                                        |
| {{ number_format($price,0,',','.') }} đồng | {{ number_format($vat,0,',','.') }} đồng | {{  number_format($total_price,0,',','.') }} đồng |
@endcomponent

Cảm ơn bạn đã sử dụng ứng dụng của chúng tôi. <br>
Nếu có vấn đề gì vui lòng liên hệ admin@demo.com
@component('mail::button', ['url' => route('home')])
Trang chủ
@endcomponent

Thanks,<br>
{{ env('MAIL_FROM_NAME','Admin') }}
@endcomponent
