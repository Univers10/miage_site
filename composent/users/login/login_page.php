<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion</title>
    <link rel="stylesheet" href="../../../assets/css/style_login.css">
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="../assets/images/master.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Connexion a l'ecole</h2>

                <form action="../../../actions/users/login/login_pageActions.php" method="POST">
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="remember">
                        <label for=""><input type="checkbox"> Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sing in" name ="validate">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="registration.html">Sing up <a href="#">Mot de passe oublé</a></p>
                        
                    </div>
                </form>
                <h3>Login with social media</h3>
                <ul class="sci">
                    <li><img src="../assets/icons/profile-user.png" alt=""></li>
                    <li><img src="../assets/icons/profile-user.png" alt=""></li>
                    <li><img src="../assets/icons/profile-user.png" alt=""></li>
                </ul>                
            </div>
        </div>
    </section>
</body>
</html>