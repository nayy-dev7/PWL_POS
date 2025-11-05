<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
 
class AuthController extends Controller 
{ 
    public function login() 
    { 
        if(Auth::check()){ // jika sudah login, maka redirect ke halaman home 
            return redirect('/'); 
        } 
        return view('auth.login'); 
    } 
 
    public function postlogin(Request $request) 
    { 
        if($request->ajax() || $request->wantsJson()){ 
            $credentials = $request->only('username', 'password'); 
 
            if (Auth::attempt($credentials)) { 
                return response()->json([ 
                    'status' => true, 
                    'message' => 'Login Berhasil', 
                    'redirect' => url('/') 
                ]); 
            } 
             
            return response()->json([ 
                'status' => false, 
                'message' => 'Login Gagal' 
            ]); 
        } 
 
        return redirect('login'); 
    } 
 
    public function logout(Request $request) 
    { 
        Auth::logout(); 
 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();     
        return redirect('login'); 
    } 
   public function register()
    {
        $levels = \App\Models\LevelModel::all(); // model untuk tabel m_level
        return view('auth.register', compact('levels'));
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|max:20|unique:m_user,username',
            'nama'     => 'required',
            'password' => 'required|min:6|max:20|confirmed', // butuh input: password_confirmation
            'level_id' => 'required|exists:m_level,level_id'
        ]);

        \App\Models\UserModel::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // HASH WAJIB !
            'nama'     => $request->nama,
            'level_id' => $request->level_id
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
