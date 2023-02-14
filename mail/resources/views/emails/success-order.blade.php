@component('mail::message')
# Thông báo

Cửa hàng đã nhận được đơn hàng của bạn

@component('mail::button', ['url' => ''])
Xem chi tiết đơn hàng
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
