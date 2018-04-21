<?php
 
require 'php/config.php';
 
 
$client = new apiClient();
 
 
// configuracion
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setDeveloperKey($api_key);
$client->setRedirectUri($redirect_url);
$client->setApprovalPrompt(false);
$oauth2 = new apiOauth2Service($client);
 
// verificar si el usuario se encuentra conectado
if (isset($_GET['code'])) {
     
    $client->authenticate();
     
    $info = $oauth2->userinfo->get();
     
    $person = ORM::for_table('usuario_google')->where('email', $info['email'])->find_one();
     
    if(!$person){ //Guardar informacion del usuario si es la primera vez que se conecta
         
        $person = ORM::for_table('usuario_google')->create();
         
        $person->email = $info['email'];
        $person->name = $info['name'];
         
        if(isset($info['picture'])){
            $person->photo = $info['picture'];
        }
        else{
            $person->photo = 'img/default_avatar.jpg';
        }
         
        $person->save();
    }
    //variable de sesion
    $_SESSION['user_id'] = $person->id();
     
    header("Location: $redirect_url");
    exit;
}
//destruimos la sesion
if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    header("Location: index.php");
}
 
$person = null;
if(isset($_SESSION['user_id'])){
    $person = ORM::for_table('usuario_google')->find_one($_SESSION['user_id']);
}
 
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inicia sesion con tu cuenta de google...</title>
         
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
         
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
     
    <body>
        <?php if($person):?> <!-- Si el usuario se encuentra conectado se muestra este codigo -->
        <div id="barra" class="container-fluid">
            <span class="sastifactorio">Usuario : <b><?php echo htmlspecialchars($person->name)?></span>
            <span class="avatar" style="background-image:url(<?php echo $person->photo?>?sz=35)"></span>
            <span> <a href="?logout" class="logoutBoton">desconectar</a></span>
        </div>
        <div id="mensaje" class="container">
            <center><a href="php/exportar_datos.php"><input type="button" value="Exportar Reporte" class="btn btn-primary"></a></center>
        </div>
        
        <?php else:?> <!-- Si el usuario se encuentra desconectado se muestra este codigo -->
            <div id="barra" class="container-fluid">
                <a href="<?php echo $client->createAuthUrl()?>" class="btn btn-primary loginboton">Inicia sesión</a>
            </div>
            <div id="mensaje" class="container">
                <center><h1>Necesita ingresar con su cuenta Google para descargar el reporte.</h1></center>
            </div>
        <?php endif;?>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.js"></script>
    </body>
</html>