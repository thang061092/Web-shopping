web shopping cart
cài đặt packet cart/ laravel

chạy composer require gloudemans/shoppingcart.

Add a new line to the providers array:
Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class

And optionally add a new line to the aliases array:
'Cart' => Gloudemans\Shoppingcart\Facades\Cart::class,

sau đó chạy lệnh composer require bumbummen99/shoppingcart để update cart/packet chạy môi trường laravel 7x

nguồn tham khảo method:
https://packagist.org/packages/bumbummen99/shoppingcart

sau đó chạy: composer require yoeunes/toastr
