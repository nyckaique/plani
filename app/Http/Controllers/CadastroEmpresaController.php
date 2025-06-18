namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CadastroEmpresaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|string|max:255|unique:empresas,nome',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Cria empresa
        $empresa = Empresa::create([
            'nome' => $request->empresa,
        ]);

        // Cria usuário vinculado à empresa
        $user = User::create([
            'empresa_id' => $empresa->id,
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Atribui a role 'Admin'
        $user->assignRole('Admin');

        // Faz login
        Auth::login($user);

        // Redireciona para dashboard Filament
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
