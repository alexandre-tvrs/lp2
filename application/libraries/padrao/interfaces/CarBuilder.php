<?php

/**
 *
 */
interface CarBuilder
{
  public function reset();

  public function setSeats($number);

  public function setEngine($type);

  public function setTripComputer($name);

  public function setGPS($name);

  public function getResult($carName);


}


?>
