<script type="text/javascript">

    function montrerDonneesLogo(url) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("conteneurListe").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

    } 

    function ajouterEvaluation(idLogo, evaluation) {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                showLogoData('obtenirDonneesLogo.php');

                if(this.responseText != "success") {
                    alert(this.responseText);
                }
            }
        };
        
        xhttp.open("POST", "ajoutEvaluation.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var parametres = "index=" + evaluation + "&idLogo=" + idLogo;
        xhttp.send(parametres);
    }

    function evalUtilisateur($idUtilisateur, $idLogo, $conn)
    {
        $average = 0;
        $avgQuery = "SELECT evaluation FROM evaluation WHERE idUtilisateur = '" . $idUtilisateur . "' and idLogo = '" . $idLogo . "'";
        $total_row = 0;
        
        if ($resultat = mysqli_query($conn, $avgQuery)) {
            $total_row = mysqli_num_rows($resultat);
        } 

        if ($total_row > 0) {
            foreach ($resultat as $row) {
                $average = round($row["evaluation"]);
            } 
        } 
        return $average;
    }
    
    function evalTotal($idLogo, $conn)
    {
        $totalVotesQuery = "SELECT * FROM evaluation WHERE idLogo = '" . $idLogo . "'";
        
        if ($resultat = mysqli_query($conn, $totalVotesQuery)) {
            $rowCount = mysqli_num_rows($resultat);
            mysqli_free_result($resultat);
        }
        
        return $rowCount;
    }


</script>