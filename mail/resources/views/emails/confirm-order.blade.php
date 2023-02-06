@component('mail::message')
# Thông báo

Vui lòng xác nhận đơn hàng #{{ $order->order_number }}, sau 30 phút nếu bạn không xác nhận thì đơn hàng sẽ tự động được xác nhận

[Xem chi tiết đơn hàng]({{ config('app.admin_url') . "/orders/" . $order->id }})

@component('mail::button', ['url' => config('app.admin_url') . "/confirm-order?token=" . $order->token])
Xác nhận ngay
@endcomponent

{{ config('app.name') }}
@endcomponent
