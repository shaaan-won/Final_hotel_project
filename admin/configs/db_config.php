<?php   
   //Remote
   
    //  define("SERVER","localhost");
    //  define("USER","root");//rajib
    //  define("DATABASE","test");
    //  define("PASSWORD","");

   //Local
   
    // define("SERVER","localhost");
    // define("USER","u391746232_hotel_db");//Hostinger database
    // define("DATABASE","u391746232_hotel_db");
    // define("PASSWORD","Shawon16520");

    //shawon
    define("SERVER","localhost");
    define("USER","root");//Sahwon
    define("DATABASE","hotel_db");
    define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="ht_"; //table prefix if any table name start with core_     

?>