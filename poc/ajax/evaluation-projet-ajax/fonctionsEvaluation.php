<script type="text/javascript">

    function survolEvaluation(idLogo, evaluation) {

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

</script>