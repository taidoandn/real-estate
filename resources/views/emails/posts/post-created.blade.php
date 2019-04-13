@component('mail::message')
# Hello, {{ $post->user->name }}
@component('mail::panel')
# Cảm ơn bạn đã đăng tin bất động sản tại công ty chúng tôi.<br>
Thời gian tin bắt đầu vào {{ $post->start_date }} và kết thúc vào ngày
{{ $post->end_date }}
<br>
Số ngày : {{ $diff_date }} ngày
<br>
Giá loại <strong>{{ $post->type->name }}</strong> : {{ number_format($post->type->price,0,",",".") }} ngày / đồng
<br>
Bạn cần thanh toán trước khi thời gian đưa tin bắt đầu trước 1 ngày.
<br>
Vui lòng thanh toán vào TK 0041000250743 ngần hàng Vietcombank, tên TK: Ngô Đình Dũng trụ sở Đà Nẵng.
@endcomponent

@component('mail::table')
| Phí đăng tin                               | VAT(10%)                                 | Thành tiền                                        |
| :-------------:                            |:-------------:                           | :--------:                                        |
| {{ number_format($price,0,',','.') }} đồng | {{ number_format($vat,0,',','.') }} đồng | {{  number_format($total_price,0,',','.') }} đồng |
@endcomponent

Nếu có vấn đề gì vui lòng liên hệ admin@demo.com
@component('mail::button', ['url' => route('home')])
Trang chủ
@endcomponent

Thanks,<br>
{{ env('MAIL_FROM_NAME','Admin') }}
@endcomponent
