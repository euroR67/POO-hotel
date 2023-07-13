<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

        spl_autoload_register(function ($class_name) {
            require_once $class_name . '.php';
        });

        $client1 = new Client("Mansour", "CHAMAEV");
        $client2 = new Client("Shadow", "FIEND");

        $hotel1 = new Hotel("Hilton","10 route de la Gare", "67000", "Strasbourg",4);
        $hotel2 = new Hotel("Ibis","20 rue de Napoleon", "67100", "Strasbourg",3);

        $chambre1 = new Chambre("2","120",false,1,$hotel1);
        $chambre2 = new Chambre("2","120",false,2,$hotel1);
        $chambre3 = new Chambre("3","120",false,3,$hotel1);
        $chambre4 = new Chambre("2","300",true,4,$hotel1);
        $chambre5 = new Chambre("2","300",true,5,$hotel1);
        $chambre6 = new Chambre("3","300",true,6,$hotel1);
        $chambre7 = new Chambre("3","300",true,7,$hotel1);
        $chambre8 = new Chambre("2","300",true,8,$hotel1);
        $chambre9 = new Chambre("2","120",false,9,$hotel1);
        $chambre10 = new Chambre("2","120",false,10,$hotel1);

        $chambre11 = new Chambre("2","120",false,1,$hotel2);
        $chambre12 = new Chambre("2","120",false,2,$hotel2);
        $chambre13 = new Chambre("3","120",false,3,$hotel2);
        $chambre14 = new Chambre("2","300",true,4,$hotel2);

        $reservation1 = new Reservation("01-01-2023","06-01-2023",$client1,$chambre1);
        $reservation2 = new Reservation("06-01-2023","10-01-2023",$client1,$chambre2);
        $reservation3 = new Reservation("15-01-2023","18-01-2023",$client2,$chambre7);
        
        $hotel1->infoHotel();
        $hotel1->infoReservation();
        $hotel2->infoReservation();
        
        $client1->afficherReservations();

        $hotel1->status();
    ?>
</table>
</body>
</html>