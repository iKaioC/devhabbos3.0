<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqFormRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $faqs = Faq::orderBy('id', 'ASC')->paginate(15);
        return view('admin.faq.index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(FaqFormRequest $request)
    {
        $validatedData = $request->validated();

        $faq = new Faq;
        $faq->title = $validatedData['title'];
        $faq->description = $validatedData['description'];

        $faq->save();
        return redirect()->route('admin-faqs')->with('message', 'FAQ criado com sucesso!');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(FaqFormRequest $request, $faq)
    {
        $faq = Faq::findOrFail($faq);

        $validatedData = $request->validated();

        $faq->title = $validatedData['title'];
        $faq->description = $validatedData['description'];

        $faq->update();

        return redirect()->route('admin-faqs')->with('message', $faq->title.' atualizado com sucesso!');
    }

    public function destroy($faq_id)
    {
        $faq = Faq::findOrFail($faq_id);
    
        $faq->delete();
        
        return redirect()->back()->with('message', 'FAQ deletado com sucesso!');
    }
}
