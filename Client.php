<?php 

        class Client {
            private string $nom;
            private string $prenom;
            private array $reservations = [];

            public function __construct(string $nom,string $prenom) {
                $this->nom = $nom;
                $this->prenom = $prenom;
            }

            public function getNom(){
                return $this->nom;
            }

            public function setNom($nom){
                $this->nom = $nom;
            }

            public function getPrenom(){
                return $this->prenom;
            }

            public function setPrenom($prenom){
                $this->prenom = $prenom;
            }

            public function getReservations(){
                return $this->reservations;
            }

            // fonction qui ajoute une réservation au client
            public function setReservations($reservations){
                array_push($this->reservations,$reservations);
            }

            // fonction qui retourne le nom et le prénom du client
            public function __toString(){
                return "$this->nom $this->prenom";
            }
            
            // fonction qui affiche les réservations du client
            public function afficherReservations(){
                echo "<div class='infoHotel'>";
                echo "Réservations de $this<br>";
                echo "<p class=reservation>".count($this->reservations)." réservations</>";
                echo "<ul>";
                // affiche les réservations du client
                foreach ($this->reservations as $reservation) {
                    echo "<li>".$reservation->getChambre()->getHotel()->titreHotel().
                    "Chambre : ".$reservation->getChambre()->getNumeroChambre().
                    "( ". $reservation->getChambre()->getNombreDeLit() .
                    " lits - ". $reservation->getChambre()->getPrix() .
                    " € - Wifi : ". $reservation->getChambre()->getWifi() ." )"." du ".$reservation->getDateDebut().
                    " au ".$reservation->getDateFin()."</li>";
                    // affiche le prix en fonction du nombre de jour reservé
                    echo "<p>Prix : ".$reservation->getChambre()->getPrix() * $reservation->nombreDeJour()." €</p>";
                }
                echo "</ul>";
                echo "</div>";
            }

        }


?>