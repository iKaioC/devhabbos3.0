<?php

namespace App\Http\Controllers\Admin;

use App\Models\Habbo;
use App\Models\HabboImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabboFormRequest;
use Illuminate\Support\Facades\Storage;

class HabboController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $habbos = Habbo::orderBy('id', 'ASC')->paginate(15);
        return view('admin.habbo.index', ['habbos' => $habbos]);
    }

    public function create()
    {
        return view('admin.habbo.create');
    }

    public function store(HabboFormRequest $request)
    {
        $validatedData = $request->validated();
    
        $habbo = new Habbo;
        $habbo->name = $validatedData['name'];
        $habbo->slug = Str::slug($validatedData['name']);
        $habbo->emulator = $validatedData['emulator'];
        $habbo->cms = $validatedData['cms'];
        $habbo->language = $validatedData['language'];
        $habbo->url = $validatedData['url'];
        $habbo->description = $validatedData['description'];
        $habbo->price = $validatedData['price'];
        $habbo->save();
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->getClientOriginalName();
                $success = $image->move(public_path('web/habbos'), $path);
    
                if ($success) {
                    $habboImage = new HabboImage();
                    $habboImage->habbo_id = $habbo->id;
                    $habboImage->path = $path;
                    $habboImage->save();
                }
            }
        }
    
        return redirect()->route('admin-habbos')->with('message', 'Habbo criado com sucesso!');
    }

    public function edit(Habbo $habbo)
    {
        return view('admin.habbo.edit', compact('habbo'));
    }

    public function update(HabboFormRequest $request, $habbo)
    {
        $habbo = Habbo::findOrFail($habbo);
        $validatedData = $request->validated();

        $habbo->name = $validatedData['name'];
        $habbo->slug = Str::slug($validatedData['name']);
        $habbo->emulator = $validatedData['emulator'];
        $habbo->cms = $validatedData['cms'];
        $habbo->language = $validatedData['language'];
        $habbo->url = $validatedData['url'];
        $habbo->description = $validatedData['description'];
        $habbo->price = $validatedData['price'];
        $habbo->save();

        // Verifica se há imagens para atualizar
        if ($request->hasFile('images')) {
            // Deleta as imagens antigas associadas ao Habbo
            $habbo->images()->delete();

            foreach ($request->file('images') as $image) {
                $path = $image->getClientOriginalName();
                $success = $image->move(public_path('web/habbos'), $path);

                if ($success) {
                    // Salva o nome do arquivo no banco de dados
                    $habboImage = new HabboImage();
                    $habboImage->habbo_id = $habbo->id;
                    $habboImage->path = $path;
                    $habboImage->save();
                }
            }
        }

        return redirect()->route('admin-habbos')->with('message', 'Habbo atualizado com sucesso.');
    }

    public function destroy($habbo_id)
    {
        $habbo = Habbo::findOrFail($habbo_id);
        $habbo->delete();
    
        return redirect()->back()->with('message', 'Habbo deletado com sucesso!');
    }

    public function deleteImage(Request $request, $id, $image)
    {
        $habbo = Habbo::findOrFail($id);
        $habboImage = HabboImage::findOrFail($image);
        $path = $habboImage->path; // obter o caminho da imagem a ser excluída
        $fullPath = public_path('web/habbos/' . $path); // obter o caminho completo para a imagem
    
        // Verificar se a imagem existe no diretório
        if (file_exists($fullPath)) {
            // Excluir a imagem do diretório
            unlink($fullPath);
        }
    
        // Excluir a imagem do banco de dados
        $habboImage->delete();
    
        return redirect()->back()->with('success', 'Imagem excluída com sucesso');
    }
}
