<?php


class Ticket {
  public $id;
  public $event_item_slot_id;
  public $start;
  public $end;
  public $location;
  public $event_item_name;
  public $image;
  public $event_name;
  public $persons;
  public $price;

  function __construct($id = null, $event_item_slot_id = null, $start = null, $end = null, $location = null, $event_item_name = null, $image = null, $event_name = null, $persons = null, $price = null) {
    if(!is_null($id) && !is_null($event_item_slot_id) && !is_null($start) && !is_null($end) && !is_null($location) && !is_null($event_name) && !is_null($persons) && !is_null($price)) {
      $this->id = $id;
      $this->event_item_slot_id = $event_item_slot_id;
      $this->start = $start;
      $this->end = $end;
      $this->location = $location;
      $this->event_item_name = $event_item_name;
      $this->image = $image;
      $this->event_name = $event_name;
      $this->persons = $persons;
      $this->price = $price;
    }
  }
}
?>