<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un compte</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

    <div class="contianer mt-5">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">S'enregistrer</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{route('register-post')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Votre nom"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">

                                <select class="custom-select" name="role">
                                    <option value="2">Type de compte</option>
                                    <option value="2">Archiviste</option>
                                    <option value="3">Utilisateur normal</option>
                                </select>

                            </div>


                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="S'enregistrer"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">J'ai déjà un compte</a>
                    </div>
                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
