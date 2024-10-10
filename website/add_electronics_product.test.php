<?php
require 'electronics_product.php';

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796


// CATEGORY 1

$product = new ElectronicsProduct('IPHN16', 'iPhone 16', 'Latest iPhone Model', 'IPHONE16', 66, 799.00, 999.00);
$product->save();

$product = new ElectronicsProduct('SAMS23', 'Samsung Galaxy S23', 'Samsung’s latest flagship smartphone. Features an advanced camera system.', 'SAMS23', 66, 699.00, 999.00);
$product->save();

$product = new ElectronicsProduct('PIXEL7P', 'Google Pixel 7 Pro', 'Pixel’s smartest phone yet. Comes with Google’s most advanced AI.', 'PIXEL7P', 66, 799.00, 1049.00);
$product->save();

// CATEGORY 2

$product = new ElectronicsProduct('HPENVY', 'HP Envy 13', 'HP Envy Laptop', 'HPENV13', 61, 899.00, 1099.00);
$product->save();

$product = new ElectronicsProduct('MACBKM2', 'MacBook M2', 'The latest MacBook powered by the M2 chip. Sleek design with advanced performance.', 'MACBKM2', 61, 999.00, 1299.00);
$product->save();

$product = new ElectronicsProduct('DELXPS15', 'Dell XPS 15', 'Powerful laptop built for creators. Known for its stunning display.', 'DELXPS15', 61, 1199.00, 1599.00);
$product->save();

// CATEGORY 3

$product = new ElectronicsProduct('APLWTCH10', 'Apple Watch Series 10', 'Latest Apple Watch', 'WATCH10', 62, 399.00, 429.00);
$product->save();

$product = new ElectronicsProduct('FITCHG5', 'Fitbit Charge 5', 'Health tracker with built-in GPS. Monitors heart rate and sleep patterns.', 'FITCHG5', 62, 129.00, 179.00);
$product->save();

$product = new ElectronicsProduct('GALSWTCH5', 'Samsung Galaxy Watch 5', 'Samsung’s latest smartwatch with health tracking features. Long-lasting battery life.', 'GALSWTCH5', 62, 249.00, 299.00);
$product->save();

// CATEGORY 4

$product = new ElectronicsProduct('AIRPODSMPX', 'Apple AirPods Max', 'Apple Noise Cancelling Headphones', 'AIRPDSMAX', 63, 499.00, 549.00);
$product->save();

$product = new ElectronicsProduct('BOSE700', 'Bose 700', 'Over-ear wireless headphones with noise cancellation. Premium sound quality.', 'BOSE700', 63, 299.00, 399.00);
$product->save();

$product = new ElectronicsProduct('SNYXM4', 'Sony WH-1000XM4', 'Industry-leading noise-cancelling headphones. Crystal clear audio with long battery life.', 'SNYXM4', 63, 249.00, 349.00);
$product->save();

// CATEGORY 5

$product = new ElectronicsProduct('SONYA7III', 'Sony A7 III', 'Full-frame mirrorless camera', 'SONYA7III', 64, 1999.00, 2299.00);
$product->save();

$product = new ElectronicsProduct('CANRE5', 'Canon EOS R5', 'Mirrorless camera with a 45MP sensor. Ideal for professional photographers.', 'CANRE5', 64, 3299.00, 3899.00);
$product->save();

$product = new ElectronicsProduct('NIKZ6II', 'Nikon Z6 II', 'High-end mirrorless camera with dual processors. Excellent image quality and video performance.', 'NIKZ6II', 64, 1999.00, 2599.00);
$product->save();

echo "All products added successfully!";
?>
