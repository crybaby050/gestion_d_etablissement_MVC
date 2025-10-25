<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../includes/index.css">
    <title>Document</title>
</head>
<body>
    <div class="divp">
        <div class="con">
            <div class="image">
                <div class="vis">
                    <span><p><h3>THIAM DEV</h3></p></span>
                </div>
            </div>
            <div class="txt">
                <div class="logo">
                    <div class="circle"></div>
                    <p>LOGO</p>
                </div>
                <div class="co">
                    <h1>CONNEXION</h1>
                    <p>Entrez vos identifiants pour vous connecter</p>
                </div>
                <form action="" method="post">
                    <div class="mail">
                        <input type="text" placeholder="Adress mail"  name="mail"><i class="fa-solid fa-envelope"></i>
                        <p><?= $errorLogin ?></p>
                    </div>
                    <div class="pass">
                        <input type="password" placeholder="Mot de passe"  name="mdp"><i class="fa-solid fa-eye-slash"></i>
                        <p><?= $errorPwd ?></p>
                    </div>
                    <div class="bout">
                        <button type="submit" name="connect">Se connecter</button>
                        <p><?= $errorConnect ?></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>