<?php

require_once "./class/Connection.php";

require_once "./class/User.php";
require_once "./class/Accommodation.php";

$users = User::all();
echo json_encode($users, true);

//$accomodations= Accommodation::getAccommodation(2);

//echo json_encode($accomodations, true);


//$accomodation= new Accommodation("prueba 1", "address test", "description test", 100, "https://res.cloudinary.com/dfvmhofes/image/upload/v1737255807/accomodations/accomodation_6.jpg", 1);
//$accomodation->saveAccommodation();

//Accommodation::updateAccommodation(10, "prueba update 10", "address test", "description test", 100, "https://res.cloudinary.com/dfvmhofes/image/upload/v1737255807/accomodations/accomodation_6.jpg");

//Accommodation::deleteAccommodation(15);



