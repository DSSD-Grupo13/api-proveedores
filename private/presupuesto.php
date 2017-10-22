<?php
function random_float($min, $max)
{
  return ($min + lcg_value() * (abs($max - $min)));
}

function crearPresupuestoJSON($productos)
{
  $presupuesto = array();
  foreach ($productos as $each) {
    $price = round(random_float(1, 5000), 2);
    $total = $price * $each->{'amount'};
    $each->{'price'} = $price;
    $each->{'total'} = $total;
    $presupuesto[] = $each;
  }

  return json_encode($presupuesto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}