@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
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
                            <input id="password-login" type="password" name="password"/>
                        </div>
                        <div class="form-element form-submit">
                            <button id="logIn" class="login" type="submit">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection