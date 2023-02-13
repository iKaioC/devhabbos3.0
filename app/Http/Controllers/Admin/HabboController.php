<?php

namespace App\Http\Controllers\Admin;

use App\Models\Habbo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabboFormRequest;

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

        $habbo->update();

        return redirect()->route('admin-habbos')->with('message', $habbo->name.' atualizado com sucesso!');
    }

    public function destroy($habbo_id)
    {
        $habbo = Habbo::findOrFail($habbo_id);
        $habbo->delete();
    
        return redirect()->back()->with('message', 'Habbo deletado com sucesso!');
    }
}
