<?php 

        class Hotel {
            private string $nom;
            private string $adresse;
            private string $cp;
            private string $ville;
            private int $etoiles;
            private array $chambres = [];

            public function __construct(string $nom,string $adresse,string $cp, string $ville,int $etoiles) {
                $this->nom = $nom;
                $this->adresse = $adresse;
                $this->cp = $cp;
                $this->ville = $ville;
                $this->etoiles = $etoiles;
            }

            public function getNom(){
                return $this->nom;
            }

            public function setNom($nom){
                $this->nom = $nom;
            }

            public function getAdresse(){
                return $this->adresse;
            }

            public function setAdresse($adresse){
                $this->adresse = $adresse;
            }

            public function getCp(){
                return $this->cp;
            }

            public function setCp($cp){
                $this->cp = $cp;
            }

            public function getVille(){
                return $this->ville;
            }

            public function setVille($ville){
                $this->ville = $ville;
            }

            public function getEtoiles(){
                return $this->etoiles;
            }

            public function setEtoiles($etoiles){
                $this->etoiles = $etoiles;
            }

            public function getChambres(){
                return $this->chambres;
            }

            public function setChambres($chambres){
                array_push($this->chambres,$chambres);
            }

            public function __toString() {
                return $this->nom . " " . $this->titreHotel();
            }

            public function titreHotel() {
                echo "<h2>$this->nom ";
                // affiche le nombre d'étoile de l'hotel en forme d'étoile
                for ($i = 0; $i < $this->etoiles; $i++) {
                    echo "⭐";
                }
                echo " $this->ville</h2>";
            }

            public function chambreReserver() {
                // affiche le nombre de chambre reserver du tableau chambres
                $nombreDeChambre = 0;
                foreach ($this->chambres as $chambre) {
                    if (count($chambre->getReservations()) > 0) {
                        $nombreDeChambre++;
                    }
                }
                return $nombreDeChambre;
            }

            public function infoHotel() {
                echo "<div class=infoHotel>";
                $this->titreHotel();
                echo "<p>$this->adresse $this->cp ". strtoupper($this->ville) ."</p>";
                // affiche le nombre de chambre qu'il y a dans le tableau chambres
                echo "<p>Nombre de chambres : ".count($this->chambres)."</p>";
                echo "<p>Nombre de chambres réservées : ".$this->chambreReserver()."</p>";
                echo "<p>Nombre de chambres dispo : " .count($this->chambres) - $this->chambreReserver() ."</p>";
                echo "</div>";
            }

            public function infoReservation(){
                echo "<div class=infoHotel>";
                echo $this->titreHotel() . "<h5>Réservations de l'hôtel</h5>";
                if ($this->chambreReserver() >= 1) {
                    echo "<p class=reservation>".$this->chambreReserver()." réservations</p>";
                    echo "<ul>";
                    foreach ($this->chambres as $chambre) {
                        foreach ($chambre->getReservations() as $reservation) {
                            echo "<li>".$reservation->getClient()->getNom()." ".$reservation->getClient()->getPrenom()." - Chambre ".$chambre->getNumeroChambre()." - du ".$reservation->getDateDebut()." au ".$reservation->getDateFin()."</li>";
                        }
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucune réservation</p>";
                }
                echo "</div>";
            }

            public function status(){
                echo "<div class='infoHotel'>";
                echo "<h5>Statut des chambres". $this->titreHotel() ." </h5>";
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th class='tablehead'>CHAMBRE</th>";
                echo "<th class='tablehead2'>PRIX</th>";
                echo "<th class='tablehead2'>WIFI</th>";
                echo "<th>ETAT</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($this->chambres as $chambre) {
                    echo "<tr>";
                    echo "<td>Chambre ".$chambre->getNumeroChambre()."</td>";
                    echo "<td>".$chambre->getPrix()." €</td>";
                    echo "<td>".$chambre->getWifi()."</td>";
                    if (count($chambre->getReservations()) > 0) {
                        echo "<td class='indispo'>RESERVER</td>";
                    } else {
                        echo "<td class='dispo'>DISPONIBLE</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }
            
        }

?>