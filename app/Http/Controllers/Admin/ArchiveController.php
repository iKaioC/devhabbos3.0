<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArchiveFormRequest;

class ArchiveController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $archives = Archive::orderBy('id', 'ASC')->paginate(15);
        return view('admin.archive.index', ['archives' => $archives]);
    }

    public function create()
    {
        return view('admin.archive.create');
    }

    public function store(ArchiveFormRequest $request)
    {
        $validatedData = $request->validated();

        $archive = new Archive;
        $archive->name = $validatedData['name'];
        $archive->slug = Str::slug($validatedData['name']);
        $archive->description = $validatedData['description'];
        $archive->link = $validatedData['link'];

        // Faz o upload da imagem e salva o caminho no banco de dados
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('web/archives'), $filename);
            $archive->image = $filename;
        }

        $archive->save();
        return redirect()->route('admin-archives')->with('message', 'Arquivo criado com sucesso!');
    }

    public function edit(Archive $archive)
    {
        return view('admin.archive.edit', compact('archive'));
    }

    public function update(ArchiveFormRequest $request, $archive)
    {
        $archive = Archive::findOrFail($archive);

        $validatedData = $request->validated();

        $archive->name = $validatedData['name'];
        $archive->slug = Str::slug($validatedData['name']);
        $archive->description = $validatedData['description'];
        $archive->link = $validatedData['link'];

        // Verifica se foi enviado um arquivo
        if ($request->hasFile('image')) {

            // Exclui a imagem antiga se ela existir
            $imagePath = public_path('web/archives/' . $archive->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Salva a nova imagem
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('web/archives/'), $imageName);

            $archive->image = $imageName;
        }

        $archive->update();

        return redirect()->route('admin-archives')->with('message', $archive->name.' atualizado com sucesso!');
    }

    public function destroy($archive_id)
    {
        $archive = Archive::findOrFail($archive_id);
    
        // Exclui a imagem do arquivo se ela existir
        if (!empty($archive->image)) {
            $imagePath = public_path('web/archives/' . $archive->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
    
        $archive->delete();
        
        return redirect()->back()->with('message', 'Arquivo deletado com sucesso!');
    }
}
