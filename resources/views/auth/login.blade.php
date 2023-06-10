<x-guest-layout pageTitle="Login">
    @section('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    @endsection

    <div class="container py-5">
    <div class="row py-5">
      <div class="col-md-3"></div>

      <div class="col-md-6 loginmain py-2">
        <div class="text-center p-2 p-md-5">
          <div class="pb-4 logincontet">
            <h3>Log In</h3>

            <p>
              Hey there, Enter your details to <br />
              Log In to your account
            </p>
          </div>
            <form method="POST" action="{{ route('login') }}" class="row g-1">
                @csrf
                <div class="work-card worksection getintouchform">
                    <div class="my-2">
                        <input type="text" name="email" placeholder="Email" />
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="my-5">
                        <input type="text" name="password" placeholder="Password" />
                        @error('password')
                            <strong>{{ $message }}</strong>
                        @enderror

                        <a href="{{ route('password.request') }}" class="float-end mt-3 text-decoration-none">Forgot Password?</a>
                    </div>

                    <div class="pt-5">
                        <div class="main-content">
                            <button type="submit" class="btn btn-sm px-5">Login</button>
                        </div>

                        <div class="mt-3">
                            <p>
                            Don’t Have Account ?<a href="{{route('register')}}" class="mt-3 text-decoration-none">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
    <!-- Login Section End  -->
</x-guest-layout>
