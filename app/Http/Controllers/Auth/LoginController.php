<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';  // Atur ini sesuai kebutuhan

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirect based on user role
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Karyawan') {
            return redirect()->route('karyawan.dashboard2');
        }

        // Default redirect if no role matches
        return redirect()->intended($this->redirectPath());
    }

    /**
     * Override default redirect path.
     *
     * @return string
     */
    protected function redirectPath()
    {
        return '/dashboard';  // Atur ini sesuai kebutuhan
    }

    /**
     * Handle a login request manually.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            \Log::info('User logged in with role: ' . Auth::user()->role);
    
            // Redirect based on user role
            if (Auth::user()->role === 'Admin') {
                return redirect()->route('admin.dashboard');  // Sesuaikan dengan rute yang benar
            } elseif (Auth::user()->role === 'Karyawan') {
                return redirect()->route('karyawan.dashboard2');  // Sesuaikan dengan rute yang benar
            }
    
            return redirect('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}