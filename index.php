<?php
// Define the Product class
class Product {
    private $id;
    private $name;
    private $price;

    // Constructor to initialize product properties
    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    // Create a product
    public function create() {
        echo "Product '{$this->name}' created with ID {$this->id} and price {$this->price}.\n";
        // Code to insert the product into the database
    }

    // Update a product
    public function update($newName, $newPrice) {
        $this->name = $newName;
        $this->price = $newPrice;
        echo "Product '{$this->id}' updated to '{$this->name}' with price {$this->price}.\n";
        // Code to update the product in the database
    }

    // Delete a product
    public function delete() {
        echo "Product '{$this->name}' with ID {$this->id} deleted.\n";
        // Code to delete the product from the database
    }
}

// Define the Coupon class
class Coupon {
    private $code;
    private $discount;

    // Constructor to initialize coupon properties
    public function __construct($code, $discount) {
        $this->code = $code;
        $this->discount = $discount;
    }

    // Create a coupon
    public function create() {
        echo "Coupon '{$this->code}' created with discount {$this->discount}%.\n";
        // Code to insert the coupon into the database
    }

    // Update a coupon
    public function update($newCode, $newDiscount) {
        $this->code = $newCode;
        $this->discount = $newDiscount;
        echo "Coupon updated to '{$this->code}' with discount {$this->discount}%.\n";
        // Code to update the coupon in the database
    }

    // Delete a coupon
    public function delete() {
        echo "Coupon '{$this->code}' deleted.\n";
        // Code to delete the coupon from the database
    }
}

// Example usage:
$product = new Product(1, "Laptop", 1200);
$product->create();
$product->update("Gaming Laptop", 1500);
$product->delete();

$coupon = new Coupon("NEWYEAR2024", 20);
$coupon->create();
$coupon->update("WINTER2024", 25);
$coupon->delete();
?>
