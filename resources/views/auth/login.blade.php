<x-guest-layout pageTitle="Login">
    <!-- Login Section Start  -->
    <div class="hero">
        <section class="ftco-section">
            <div class="row nsdvmn">

                <div class="col-md-6"></div>

                <div class="col-md-6 hjdfhdsjfh">
                    <div class="bg-sign-glass">
                        <div class="sigin-bg-color" id="sign-bg-set">

                            <h2 class="head-text-form">Login</h2>
                            <p class="login_play_text">We are happy to see you again!</p>

                            {{-- <form method="POST" action="{{ route('login') }}"> --}}

                            <form method="POST" action="{{ route('login') }}" class="row g-1">
                                @csrf
                                <div class="col-md-12" style="position: relative;top: 30px;">
                                    <label class="form-label" id="label-form">Username</label>
                                    <div class="section space long-value-input-container">
                                        <input type="text" name="email" required
                                            placeholder="Enter your Email or username" class="long-value-input"
                                            value="" style="padding-right: 40px" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="position: relative;top: 60px;">
                                    <label>Password</label>
                                    <div class="section space long-value-input-container">
                                        <input id="password-field" name="password" type="password"
                                            class="long-value-input" value="" class="pass"
                                            placeholder="Enter Your Password" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <a href="{{ route('password.request') }}" class="log_forget_pass">forget
                                        Password</a>

                                </div>

                                <div class="col-md-12" style="position: relative;top: 90px;">
                                    <button class="btn2  btn-enter  form-control1" type="submit"> Login </button>

                                    <div style="text-align:center;" class="mt-4">
                                        <img src="{{ url('frontend\img\headerbanner\1.png') }}" alt="">
                                        <img src="{{ url('frontend\img\headerbanner\2.png') }}" alt="">
                                        <img src="{{ url('frontend\img\headerbanner\3.png') }}" alt="">

                                    </div>

                                    <div class="d-flex justify-content-center signupbtn">
                                        <div style="position: relative; top: 10px;">
                                            <span class="account mt-5" style="font-size: small;">Have an account
                                                already?
                                            </span>
                                            <a href="{{ route('register') }}" class="signup"> Signup</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Login Section End  -->
</x-guest-layout>
