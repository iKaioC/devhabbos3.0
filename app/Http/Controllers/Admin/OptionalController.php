<?php

namespace App\Http\Controllers\Admin;

use App\Models\Optional;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionalFormRequest;
use App\Models\OptionalImage;

class OptionalController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $optionals = Optional::orderBy('category', 'ASC')->paginate(15);
        return view('admin.optional.index', ['optionals' => $optionals]);
    }

    public function create()
    {
        return view('admin.optional.create');
    }

    public function store(OptionalFormRequest $request)
    {
        $validatedData = $request->validated();

        $optional = new Optional;
        $optional->name = $validatedData['name'];
        $optional->slug = Str::slug($validatedData['name']);
        $optional->category = $validatedData['category'];
        $optional->tag1 = $validatedData['tag1'];
        $optional->tag2 = $validatedData['tag2'];
        $optional->tag3 = $validatedData['tag3'];
        $optional->description = $validatedData['description'];
        $optional->price = $validatedData['price'];
        $optional->repository = $validatedData['repository'];
        $optional->icon = $validatedData['icon'];
        $optional->color = $validatedData['color'];
        $optional->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->getClientOriginalName();
                $success = $image->move(public_path('web/optionals'), $path);
    
                if ($success) {
                    $optionalImage = new OptionalImage();
                    $optionalImage->optional_id = $optional->id;
                    $optionalImage->path = $path;
                    $optionalImage->save();
                }
            }
        }

        return redirect()->route('admin-optionals')->with('message', 'Opcional criado com sucesso!');
    }

    public function edit(Optional $optional)
    {
        return view('admin.optional.edit', compact('optional'));
    }

    public function update(OptionalFormRequest $request, $optional)
    {
        $optional = Optional::findOrFail($optional);

        $validatedData = $request->validated();

        $optional->name = $validatedData['name'];
        $optional->slug = Str::slug($validatedData['name']);
        $optional->category = $validatedData['category'];
        $optional->tag1 = $validatedData['tag1'];
        $optional->tag2 = $validatedData['tag2'];
        $optional->tag3 = $validatedData['tag3'];
        $optional->description = $validatedData['description'];
        $optional->price = $validatedData['price'];
        $optional->repository = $validatedData['repository'];
        $optional->icon = $validatedData['icon'];
        $optional->color = $validatedData['color'];
        $optional->save();

        // Verifica se há imagens para atualizar
        if ($request->hasFile('images')) {
            // Deleta as imagens antigas associadas ao Opcional
            $optional->images()->delete();

            foreach ($request->file('images') as $image) {
                $path = $image->getClientOriginalName();
                $success = $image->move(public_path('web/optionals'), $path);

                if ($success) {
                    // Salva o nome do arquivo no banco de dados
                    $optionalImage = new OptionalImage();
                    $optionalImage->optional_id = $optional->id;
                    $optionalImage->path = $path;
                    $optionalImage->save();
                }
            }
        }

        return redirect()->route('admin-optionals')->with('message', $optional->name.' atualizado com sucesso!');
    }

    public function destroy($optional_id)
    {
        $optional = Optional::findOrFail($optional_id);
        $optional->delete();
    
        return redirect()->back()->with('message', 'Opcional deletado com sucesso!');
    }    

    public function deleteImage(Request $request, $id, $image)
    {
        $optional = Optional::findOrFail($id);
        $optionalImage = OptionalImage::findOrFail($image);
        $path = $optionalImage->path; // obter o caminho da imagem a ser excluída
        $fullPath = public_path('web/optionals/' . $path); // obter o caminho completo para a imagem
    
        if (file_exists($fullPath)) {
            // Excluir a imagem do diretório
            unlink($fullPath);
            // Verificar se a exclusão da imagem do diretório foi bem-sucedida
            if (!file_exists($fullPath)) {
                // Excluir a imagem do banco de dados
                $optionalImage->delete();
            }
        }
    
        // Excluir a imagem do banco de dados
        $optionalImage->delete();
    
        return redirect()->back()->with('success', 'Imagem excluída com sucesso');
    }
}
