<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TermFormRequest;

class TermController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $terms = Term::orderBy('id', 'ASC')->paginate(15);
        return view('admin.term.index', ['terms' => $terms]);
    }

    public function create()
    {
        return view('admin.term.create');
    }

    public function store(TermFormRequest $request)
    {
        $validatedData = $request->validated();

        $term = new Term;
        $term->title = $validatedData['title'];
        $term->description = $validatedData['description'];
        $term->category = $validatedData['category'];

        $term->save();
        return redirect()->route('admin-terms')->with('message', 'Termo criado com sucesso!');
    }

    public function edit(Term $term)
    {
        return view('admin.term.edit', compact('term'));
    }

    public function update(TermFormRequest $request, $term)
    {
        $term = Term::findOrFail($term);

        $validatedData = $request->validated();

        $term->title = $validatedData['title'];
        $term->description = $validatedData['description'];
        $term->category = $validatedData['category'];

        $term->update();

        return redirect()->route('admin-faqs')->with('message', $term->title.' atualizado com sucesso!');
    }

    public function destroy($term_id)
    {
        $term = Term::findOrFail($term_id);
    
        $term->delete();
        
        return redirect()->back()->with('message', 'Termo deletado com sucesso!');
    }
}
