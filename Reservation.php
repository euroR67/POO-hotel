<?php 

        class Reservation {
            private string $dateDebut;
            private string $dateFin;
            private Client $client;
            private Chambre $chambre;

            public function __construct(string $dateDebut,string $dateFin,Client $client,Chambre $chambre) {
                $this->dateDebut = $dateDebut;
                $this->dateFin = $dateFin;
                $this->client = $client;
                $this->chambre = $chambre;
                $client->setReservations($this);
                $chambre->setReservations($this);
            }

            public function getDateDebut(){
                return $this->dateDebut;
            }
            
            public function setDateDebut($dateDebut){
                $this->dateDebut = $dateDebut;
            }

            public function getDateFin(){
                return $this->dateFin;
            }

            public function setDateFin($dateFin){
                $this->dateFin = $dateFin;
            }

            public function getClient(){
                return $this->client;
            }

            public function setClient($client){
                $this->client = $client;
            }

            public function getChambre(){
                return $this->chambre;
            }

            public function setChambre($chambre){
                $this->chambre = $chambre;
            }

            // fonction qui retourne le nombre de jour entre la date de début et la date de fin
            public function nombreDeJour(){
                $date1 = new DateTime($this->dateDebut);
                $date2 = new DateTime($this->dateFin);
                $interval = $date1->diff($date2);
                return $interval->format('%a');
            }
        }

?>