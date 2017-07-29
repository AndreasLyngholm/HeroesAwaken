<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'birthday' => Carbon::createFromFormat('d-m-Y', $data['birthday'])->format('Y-m-d'),
            //'language' => $data['language'],
            //'country' => $data['country'],
            'password' => bcrypt($data['password']),
        ]);
        $user->roles()->attach(1);

        return $user;
    }

    public function loginOauthRevive()
    {
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId' => 'heroesawaken_login_'.(App::environment('local') ? '_local' : ''),
            'clientSecret' => 'xf05a3q8vv86nei0igpcblw7p9hfy27m',
            'urlAuthorize' => 'https://battlelog.co/oauth/authorize/',
            'urlAccessToken' => 'https://battlelog.co/oauth/token/',
            'urlResourceOwnerDetails' => 'https://battlelog.co/oauth/tokeninfo/'
        ]);

        // If we don't have an authorization code then get one
        if (!isset($_GET['code'])) {
            header('Location: ' . $provider->getAuthorizationUrl());
            exit;
        } else {

            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code'],
            ]);

            $client = new GuzzleHttp\Client();
            $res = $client->get('https://battlelog.co/oauth/tokeninfo/?access_token='.$token);

            if ($res->getStatusCode() == 200)
            {
                $token_info = json_decode($res->getBody());
                $user = $token_info->user;

                // See if we can scoop their discord id, too (if not already linked)
                if (isset($user->discord_id) && isset($user->discord_name))
                {
                    if(!UserDiscord::where('user_id', Auth::id())->exists())
                    {
                        UserDiscord::create([
                            'user_id' => Auth::id(),
                            'discord_id' => $user->discord_id,
                            'discord_name' => $user->discord_name
                        ]);

                        $client = new \GuzzleHttp\Client();
                        $res = $client->get('https://bot.heroesawaken.com/api/refresh/329078443687936001/' . $user->discord_id);
                    }
                }

                if(UserRevive::where('user_id', Auth::id())->exists())
                {
                    UserRevive::where('user_id', Auth::id())->first()->update([
                        'revive_id' => $user->id,
                        'revive_name' => $user->username,
                        'revive_email' => $user->email,
                        'revive_role' => $user->role
                    ]);
                    return redirect()->route('profile.lists')->with('success', 'We updated your Revive Network account link!');
                }
                else
                {
                    UserRevive::create([
                        'user_id' => Auth::id(),
                        'revive_id' => $user->id,
                        'revive_name' => $user->username,
                        'revive_email' => $user->email,
                        'revive_role' => $user->role
                    ]);
                    return redirect()->route('profile.lists')->with('success', 'We linked your Revive Network account!');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'There was a critical error linking your Revive Network account!');
            }
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
