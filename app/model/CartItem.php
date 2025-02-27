<?php
require_once __DIR__ . '/Ticket.php';

class CartItem {
  public $id;
  public $cart_id;
  public Ticket $ticket;
  public $quantity;
  public $created_at;

  function __construct($id = null, $cart_id = null, $ticket = null, $quantity = null, $created_at = null) {
    if(!is_null($id) && !is_null($cart_id) && !is_null($ticket) && !is_null($quantity) && !is_null($created_at)) {
      $this->id = $id;
      $this->cart_id = $cart_id;
      $this->ticket = $ticket;
      $this->quantity = $quantity;
      $this->created_at = $created_at;
    }
  }
}
?>