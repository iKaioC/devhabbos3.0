<?php

namespace App\Http\Controllers\Client;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserClientFormRequest;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        $countries = DB::table('countries')->get();

        return view('client.user.edit', compact('user', 'countries'));
    }

    public function update(UserClientFormRequest $request)
    {
        $user = Auth::user();

        $country = $request->country;

        if ($country == null) {
            $country = 'Brasil (BR)';
        }

        $user->update([
            'name' => $request->name,
            'cell' => $request->cell,
            'link' => $request->link,
            'country' => $country,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('profile-images'), $filename);
            $user->update(['image' => $filename]);
        }

        return redirect()->route('user-edit')->with('message', 'Dados atualizados com sucesso');
    }

    public function updateImage(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Mover nova imagem para o diretório
            if (!$file->move(public_path('profile-images'), $filename)) {
                return redirect()->route('user-edit')->with('error', 'Não foi possível salvar a nova imagem');
            }

            $user->update(['image' => $filename]);
        }

        return redirect()->route('user-edit')->with('message', 'Imagem atualizada com sucesso');
    }

    public function removeImage()
    {
        $user = Auth::user();

        // Excluir imagem do diretório da pasta
        if ($user->image != '') {
            $old_image_path = public_path('profile-images/') . $user->image;
            if (File::exists($old_image_path)) {
                File::delete($old_image_path);
            }
        }

        $user->update(['image' => '']);

        return redirect()->route('user-edit')->with('message', 'Imagem removida com sucesso');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $password = $request->input('password');
        $newpassword = $request->input('newpassword');
        $newpasswordConfirmation = $request->input('newpassword_confirmation');

        if (!Hash::check($password, $user->password)) {
            return redirect()->route('user-edit')->with('error', 'Senha atual inválida');
        }
    
        if (strlen($newpassword) < 8) {
            return redirect()->route('user-edit')->with('error', 'A nova senha deve ter pelo menos 8 caracteres');
        }
    
        if (!preg_match('/[A-Z]/', $newpassword)) {
            return redirect()->route('user-edit')->with('error', 'A nova senha deve conter pelo menos uma letra maiúscula');
        }
    
        if (!preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'\"|,.<>\/?]/', $newpassword)) {
            return redirect()->route('user-edit')->with('error', 'A nova senha deve conter pelo menos um caractere especial');
        }
    
        if ($newpassword != $newpasswordConfirmation) {
            return redirect()->route('user-edit')->with('error', 'A nova senha e sua confirmação não coincidem');
        }
    
        // Tudo certo, atualize a senha aqui
        $user->password = Hash::make($newpassword);
        $user->save();
    
        return redirect()->route('user-edit')->with('message', 'Senha alterada com sucesso');
    }
    
}
