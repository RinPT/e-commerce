<div class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#signin">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#register">Register</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="signin">
                    <form action="{{ route('login') }}" method="POST">
                        <div class="form-group">
                            <label for="singin-email">Email address:</label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="singin-password">Password:</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" name="remember" />
                                <label class="form-control-label font-secondary" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="lost-link font-secondary">Lost your password?</a>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="font-secondary">Sign in with social account</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="register">
                    <form action="{{ route('register') }}" method="POST">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="surname">Your Surname:</label>
                            <input type="text" class="form-control" name="surname" />
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Again:</label>
                            <input type="password" class="form-control" name="password_confirmation"/>
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"
                                    required />
                                <label class="form-control-label font-secondary" for="register-agree">I agree to the
                                    privacy policy</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="font-secondary">Sign in with social account</label>
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
