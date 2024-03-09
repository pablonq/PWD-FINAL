<?php
require '../vendor/autoload.php';
class merkPago {
  
  public function pagar($items, $arrayRedireccion){
  MercadoPago\SDK::setAccessToken('TEST-1323948781483767-020715-1d49ac76392fec760ea8bd8d320dbfc3-1673270882');
  $preference = new MercadoPago\Preference();
  $preference->items = $items;
  $preference->back_urls = $arrayRedireccion;
  $preference->save();

}
}
?>