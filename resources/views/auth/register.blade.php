<x-guest-layout pageTitle="Register">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <x-front.card>
                    <h2 class="text-center"> Create your Account</h2>
                    <form method="POST" action="{{ route('register') }}" class="row g-1">
                        @csrf
                        <div class="col-md-12" style="position: relative;top: 5px;">
                            <label class="form-label" id="label-form">Full name</label>
                            <div class="section space long-value-input-container">
                                <input type="text" required class="long-value-input" name="name"
                                    style="padding-right: 40px" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="position: relative;top: 20px;">
                            <label>Username</label>
                            <div class="section space long-value-input-container">
                                <input id="password-field" type="text" class="long-value-input pass"
                                    name="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="position: relative;top: 30px;">
                            <label>Email</label>
                            <div class="section space long-value-input-container">
                                <input id="password-field" type="email" class="long-value-input"
                                    class="pass" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="position: relative;top: 40px;">
                            <label>Password</label>
                            <div class="section space long-value-input-container">
                                <input id="password-field" type="password" class="long-value-input"
                                    class="pass" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="position: relative;top: 40px;">
                            <label> Repeat Password</label>
                            <div class="section space long-value-input-container">
                                <input id="password-field" type="password" class="long-value-input"
                                    value="" class="pass" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-md-12" style="position: relative;top: 40px;">
                            <label> Repeat Password</label>
                            <div class="section space long-value-input-container">
                                <select name="role" id="role">
                                    <option value="particular">particular</option>
                                    <option value="professional">professional</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" style="position: relative;top: 70px;">
                            <button class="btn2  btn-enter  form-control1" type="submit"> Register</button>

                            <div style="text-align:center;" class="mt-4">
                                <img src="{{ url('frontend\img\headerbanner\1.png') }}" alt="">
                                <img src="{{ url('frontend\img\headerbanner\2.png') }}" alt="">
                                <img src="{{ url('frontend\img\headerbanner\3.png') }}" alt="">
                            </div>

                            <div class="d-flex justify-content-center signupbtn">
                                <div>
                                    <span class="account " style="font-size: small;">Have an account already?
                                    </span>
                                    <a href="{{ route('login') }}" class="signup"> Signin</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-front.card>
            </div>
        </div>
    </div>
</x-guest-layout>
