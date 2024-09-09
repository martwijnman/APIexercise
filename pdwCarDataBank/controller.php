<?php 

// carsign
$kenteken = $_POST['kenteken'];

// cURL
$ch = curl_init(); 

// Set options
curl_setopt($ch, CURLOPT_URL, "https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=$kenteken");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute request and fetch-response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    $error = curl_error($ch); 
    echo "Error: $error";
} else {
    // Output the response
    $cars = json_decode($response);
    foreach($cars as $car){
        // echo $car->kenteken;
            echo "Kenteken: " . $car->kenteken . "<br>";
            echo "Merk: " . $car->merk . "<br>";
            echo "Voertuigsoort: " . $car->voertuigsoort . "<br>";
    
    }
    
}

// Close the cURL session
curl_close($ch);
?>