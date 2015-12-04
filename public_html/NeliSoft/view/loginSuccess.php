<!DOCTYPE HTML>

<html lang="Fr">

    <head>

        <title>Login</title>
        <meta name="author" content="DAPP Maxime uapv1504059 et BARDOUT Rudy uapv1403233" >
        <meta name="description" content="Première page qui
permet d'enregistrer un utilisateur">
        <meta name="keywords" content="université d'Avignon, ceri, informatique, HTML">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="style.css" rel="stylesheet" type="text/css" >
        
    </head>

    <body>

        <h2>Login</h2>
    
        <form name="login" action="monApplication.php?action=checkLogin" method="POST" enctype="multipart/form-data" >

        <table width="600px" align="center">
            <tr>
                <td class="titre">Login </td>

                <td><input name="login" type="text" /></td>
            </tr>

            <tr>
                <td class="titre">Mot de passe </td>

                <td><input name="pass" type="password" /></td>
            </tr>
                <td></td>
                <td><input type="submit" value="se connecter" /><input type="reset" value="Reinitialiser"/></td>

            </tr>

        </table>

    </form>


    </body>


</html>