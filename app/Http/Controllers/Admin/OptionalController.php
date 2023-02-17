<?php

namespace App\Http\Controllers\Admin;

use App\Models\Optional;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionalFormRequest;

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
        $optional->icon = $validatedData['icon'];
        $optional->color = $validatedData['color'];

        $optional->save();
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
        $optional->icon = $validatedData['icon'];
        $optional->color = $validatedData['color'];

        $optional->update();

        return redirect()->route('admin-optionals')->with('message', $optional->name.' atualizado com sucesso!');
    }

    public function destroy($optional_id)
    {
        $optional = Optional::findOrFail($optional_id);
        $optional->delete();
    
        return redirect()->back()->with('message', 'Opcional deletado com sucesso!');
    }
}
