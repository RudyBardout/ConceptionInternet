<html>
<body>

    <h2>Inscription</h2>

    <form name="inscription" action="monApplication.php?action=checkInscription" method="POST" enctype="multipart/form-data" >

    <table width="600px" align="center">
            
        <tr>
            <td class="titre">nom :</td> 

            <td><input name="nom" type="text" /></td>
        </tr>

        

        <tr>
            <td class="titre">prenom :</td>

            <td><input name="prenom" type="text"  /></td>
        </tr>

        <tr>
            <td class="titre">Login </td>

            <td><input name="login" type="text" /></td>
        </tr>

        <tr>
            <td class="titre">Mot de passe </td>

            <td><input name="pass" type="password" /></td>
        </tr>

        <tr>
            <td class="titre">Confirmer le mot de passe </td>

            <td><input name="passConf" type="password" /></td>
        </tr>

        <tr>    
            <td class="titre">image avatar : </td>

            <td><input name="fichier" type="file" /></td>
        </tr> 

        <tr>

            <td></td>

            <td><input type="submit" value="s'inscrire" /><input type="reset" value="Reinitialiser"/></td>

        </tr>

    </table>

</form>


</body>


</html>

