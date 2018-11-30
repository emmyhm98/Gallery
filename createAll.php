<?php

$db = new PDO("mysql:host=localhost","root","");
 try {

       $db->exec("CREATE DATABASE IF NOT EXISTS HandmadeGallery;");
       echo "database created successfully";
    }
    catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }

$db->exec("use HandmadeGallery");
/////////////////CREATE Category TABLE//////////////////
$db->exec("CREATE TABLE IF NOT EXISTS categories (
cat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
);");
/////////////////CREATE PRODUCTS TABLE//////////////////
$db->exec("CREATE TABLE IF NOT EXISTS products (
prod_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
cat_id INT NOT NULL,
name VARCHAR(100) NOT NULL,
img VARCHAR(100) NOT NULL,
price DECIMAL(4,2) NOT NULL,
offer_price DECIMAL(4,2) NOT NULL,
description TEXT NOT NULL,
sales INT);");

////////////CREATE CUSTOMER TABLE//////////////////////
$db->exec("CREATE TABLE IF NOT EXISTS customers (
cust_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
phone varchar(11),
address varchar(100));");
////////////CREATE ORDERS TABLE///////////////////////
$db->exec("CREATE TABLE IF NOT EXISTS ORDERS(
order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
cust_id INT NOT NULL,
name VARCHAR(100) NOT NULL,
code VARCHAR(50) NOT NULL,
street VARCHAR(100) NOT NULL,
line2 VARCHAR(100),
town VARCHAR(100) NOT NULL,
country VARCHAR(100) NOT NULL,
phone VARCHAR(13),
date VARCHAR(50),
price DECIMAL(6,2),
foreign key orders(cust_id) references customers(cust_id));");

/////////////////////////////////////////////////////////  cat_id =1-Children products,cat_id=2-Jewelery,cat_id=3 -wood & stone,cat_id=4- paintings and drawings////
 $db->exec("INSERT INTO products(cat_id,name,img,price,offer_price,description,sales) values(1,'Dance Star Bunny','img/DanceStar-Bunny1-370x370.jpg',50.35,28.45,'Meet Dance Star Bunny! She has pink leg warmers and wears a pink cardigan over a cute patterned pink jump suit. Her cardigan is fully removable so the little ones can play dress up. Standing she is about 50cm tall,but naturally she prefers to sit on a bed or a shelf, or of course play with the kids!!
 Dance Star Bunny was lovingly handmade by Miss.Ola in Egypt.',30),
 (1,'Freddy Fox Soft','img/Fox1-370x370.jpg',45.44,28.45,'Meet Freddy! He is hand knit from vibrant orange yarn with a white belly and tail tip, and black boots.Standing he is about 50cm tall, but naturally
 he prefers to sit on a bed or a shelf, or of course play with the kids!! Freddy was lovingly handmade by Miss.Ola in Egypt.',40),
 (1,'Baby Girl Booties','img/Pink-Booties-€15.-370x370.jpg',44.50,24.70,'Baby booties handknit by Suzy Taylor, Little Bear Knitwear. The booties are made with a super soft bamboo / cotton mix wool.
The ribbon helps the booties stay in place as well as the ribbed top.',50),
(2,'Peacock Feather Ring','img/Ruby-Robin-Peacock-Ring-370x370.jpg',50.50,43.70,'Exclusive to the Artists Gift Gallery! Stunning real peacock feather encased in a hand-blown glass orb. This ring is the perfect statement piece for a night on the town, or gift for anyone who appreciates unique jewellery!
The large glass dome measures 25mm, and is mounted onto a nickel-free bronze ring base which is fully adjustable, The glass dome is tougher than you would think, and can handle normal wear',30),
(2,'FLOWER EARRINGS WITH STERLING SILVER HOOKS','img/JC18-150x150.jpg',45.50,30.70,'Dainty little flower earrings made from polymere clay with sterling silver hooks. The clay used to create these earrings is lightweight and flexible and so not fragile like other forms of clay. Available in many colours so you are bound to
find one to suit any outfit!Handmade in Egypt.',50),
(2,'Aura Circle Pendant','img/untitled-2-370x370.jpg',90.50,83.70,'Handmade Sterling Silver Aura Circle Pendant with 14ct Gold Filled Bead,
Sterling Silver Beads and Hematite on a plain sterling silver chain. Designed and Handmade in Egypt.',80),
(2,'Blue Teacup Ring','img/plain-blue-tcup-ring-370x370.jpg',12.45,9.50,'This cute little plain blue teacup ring is made with a ceramic teacup and the ring is adjustable to fit all sizes.',20),
(3,'Balancing Boat large','img/large-240-370x370.jpg',30.40,24.60,'Balancing Boats are wooden sculptures that imitate boats sailing on the ocean, inspired by the Galway Hooker. They are also interactive – gently push the balancing base, relax and sail your imagination away…
All details finished with loving care and polished to the highest quality.',20),
(3,'Dingle Town Musicians','img/ventry-dingle-370x370.jpg',50.12,40.50,'Balancing Boats are wooden sculptures that imitate boats sailing on the ocean, inspired by the Galway Hooker. They are also interactive – gently push the balancing base, relax and sail your imagination away…
All details finished with loving care and polished to the highest quality.',15),
(4,'Hook Lighthouse Print','img/Hook-Lighthouse-I-9-370x370.jpg',150.43,80.90,'Beautiful print of an original watercolour painting',10),
(4,'BALLYHACK CASTLE AND HARBOUR PRINT','img/Ballyhack-Castle-and-Harbour-8-370x370.jpg',295.31,240.59,'Beautiful print of an original watercolour painting',10);");
?>
