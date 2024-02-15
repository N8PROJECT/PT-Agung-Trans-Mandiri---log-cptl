<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-sdfsdfsf..." crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
    <div id="back">
        <canvas id="canvas" class="canvas-back"></canvas>
        <div class="backLeft">
        </div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form id="form-login" method="post" action="/login">
                        @csrf
                        <div class="form-element form-stack">
                            <label for="email-login" class="form-label">Email</label>
                            <input id="email-login" type="text" name="email"/>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Password</label>
                            <div class="password-input">
                                <input id="password-login" type="password" name="password"/>
                                <button type="button" id="showPassword"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-element form-submit">
                            <button id="logIn" class="login" type="submit">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password-login');
            const showPasswordButton = document.getElementById('showPassword');

            showPasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showPasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    showPasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        });
    </script>
</body>
</html>