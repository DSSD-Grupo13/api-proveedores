<?php
function random_float($min, $max)
{
  return ($min + lcg_value() * (abs($max - $min)));
}

function crearPresupuestoJSON($productos)
{
  $presupuesto = [];
  $total = 0;
  foreach ($productos as $each) {
    $precio = round(random_float(1, 5000), 2);
    $total_producto = $precio * $each['cantidad'];
    $each['precio'] = $precio;
    $each['total'] = $total_producto;
    $total = $total + $total_producto;
    $presupuesto[] = $each;
  }

  return array(
      'objetos' => $presupuesto,
      'total_final' => $total);
}