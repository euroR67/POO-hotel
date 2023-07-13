<?php 

        class Chambre {
            private string $nombreDeLit;
            private float $prix;
            private bool $wifi;
            private int $numeroChambre;
            private Hotel $hotel;
            private array $reservations = [];

            public function __construct(string $nombreDeLit,float $prix,bool $wifi,int $numeroChambre,Hotel $hotel) {
                $this->nombreDeLit = $nombreDeLit;
                $this->prix = $prix;
                $this->wifi = $wifi;
                $this->numeroChambre = $numeroChambre;
                $this->hotel = $hotel;
                $hotel->setChambres($this);
            }

            public function getNombreDeLit(){
                return $this->nombreDeLit;
            }

            public function setNombreDeLit($nombreDeLit){
                $this->nombreDeLit = $nombreDeLit;
            }

            public function getPrix(){
                return $this->prix;
            }

            public function setPrix($prix){
                $this->prix = $prix;
            }

            public function getWifi(){
                if($this->wifi == true){
                    return "📶";
                }else{
                    return "❌";
                }
                return $this->wifi;
            }

            public function setWifi($wifi){
                $this->wifi = $wifi;
            }

            public function getNumeroChambre(){
                return $this->numeroChambre;
            }

            public function setNumeroChambre($numeroChambre){
                $this->numeroChambre = $numeroChambre;
            }

            public function getHotel(){
                return $this->hotel;
            }

            public function setHotel($hotel){
                $this->hotel = $hotel;
            }

            public function getReservations(){
                return $this->reservations;
            }

            public function setReservations($reservations){
                array_push($this->reservations,$reservations);
            }

            
        }

?>