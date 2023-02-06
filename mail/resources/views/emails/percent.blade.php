@component('mail::message')
# Chúc mừng bạn đã nhận được mã giảm giá từ phía cửa hàng

Cửa hàng chúng tôi có ưu đãi cho bạn mã giảm giá {{ $discount->value }}% cho tất cả các đơn hàng.

@component('mail::button', ['url' => config('app.url')])
Đi đến mua sắm ngay
@endcomponent

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
