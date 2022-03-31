# laravel8-template
Laravel 8 template with RBAC and Social Media Login

Step 1: git clone https://github.com/bycorpuz/laravel8-template.git

Step 2: run composer install

Step 3: configure .env file

```
add the following for RECAPTCHA

RECAPTCHA_SITE_KEY=YOUR_RECAPTCHA_SITE_KEY
RECAPTCHA_SECRET_KEY=YOUR_RECAPTCHA_SECRET_KEY

add the following for Google Login

GOOGLE_CLIENT_ID=YOUR_GOOGLE_CLIENT_ID
GOOGLE_CLIENT_SECRET=YOUR_GOOGLE_CLIENT_SECRET
GOOGLE_REDIRECT=YOUR_GOOGLE_REDIRECT

add the following for Facebook Login

FACEBOOK_CLIENT_ID=YOUR_FACEBOOK_CLIENT_ID
FACEBOOK_CLIENT_SECRET=YOUR_FACEBOOK_CLIENT_SECRET
FACEBOOK_REDIRECT=YOUR_FACEBOOK_REDIRECT
```
Step 4: run php artisan key:generate

Step 5: Update /config/app.php add the below code
```
'recaptcha_site_key' => env('RECAPTCHA_SITE_KEY', ''),
'recaptcha_secret_key' => env('RECAPTCHA_SECRET_KEY', ''),
```

Step 6: Update /config/services.php add the below code
```
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT'),
],

'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_REDIRECT'),
],
```

Step 7: Update /vendor/laravel/ui/auth-backend/AuthenticateUsers.php with the below code
```
public function login(Request $request){
    $secretKey = config('app.recaptcha_secret_key');
    $responseKey = $request['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $responseKey;
    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response->success){
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    } else {
        return response()->json(['error_captcha' => 'Invalid Captcha, Please Try Again.']);
    }
}
```
