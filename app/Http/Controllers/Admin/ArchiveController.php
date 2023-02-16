<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $archive->update();

        return redirect()->route('admin-archives')->with('message', $archive->name.' atualizado com sucesso!');
    }

    public function destroy($archive_id)
    {
        $archive = Archive::findOrFail($archive_id);
        $archive->delete();
    
        return redirect()->back()->with('message', 'Arquivo deletado com sucesso!');
    }
}
