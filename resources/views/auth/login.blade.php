@extends('layouts.login')


@section('content')
    <form method="post" id="login-form" class="smart-form" enctype="multipart/form-data">
        @csrf

        <header>
            Sign In
        </header>

        <fieldset>

            <!-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->

            <section>
                <label class="label">Username or Email</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" name="username_email">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
            </section>

            <section>
                <label class="label">Password</label>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                    <input type="password" name="password">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                {{-- <div class="note">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div> --}}
            </section>

            <section>
                <label class="checkbox">
                    <input type="checkbox" name="remember" checked="">
                    <i></i>Stay signed in</label>
            </section>

            <section>
                <div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha_site_key') }}"></div>
              <section>
        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary">
                Sign in
            </button>
        </footer>
    </form>

    <h5 class="text-center"> - Or sign in using -</h5>
    <ul class="list-inline text-center">
        <li>
            <a href="{{ route('facebook.login') }}" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
            <a href="{{ route('google.login') }}" class="btn btn-danger btn-circle"><i class="fa fa-google"></i></a>
        </li>
    </ul>
@endsection

@section('myjsfile')
    <script>
        $('#login-form').on('submit', function(event){
            event.preventDefault();

            var formData = $("#login-form").serialize();

            $.ajax({
                url: "{{ route('login') }}",
                method: "POST",
                data: formData,
                beforeSend: function(){
                    Swal.fire({
                        title: 'Checking user credentials ...',
                        showConfirmButton: false
                    })
                },
                success: function(response){
                    if (response.error_captcha){
                        Swal.fire({
                            title: 'Error',
                            html: response.error_captcha,
                            icon: 'error',
                            showConfirmButton: true
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Success!',
                            html: 'User credentials is valid.',
                            icon: 'success',
                            timer:  1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                },
                error: function(jqXhr, json, errorThrown){
                    var errorsResponse = jqXhr.responseJSON.errors;
                    var errors = '';

                    $.each(errorsResponse, function(i, data){
                        errors += data + '<br>';
                    });

                    Swal.fire({
                        title: 'Error',
                        html: jqXhr.responseJSON.message + "<br>" + errors,
                        icon: 'error',
                            showConfirmButton: true
                    }).then(() => {
                        window.location.reload();
                    });
                }
            });
        });
    </script>
@stop