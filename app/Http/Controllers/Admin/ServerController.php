<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServerFormRequest;
use App\Models\Server;

class ServerController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public $server_id;

    public function index()
    {
        $servers = Server::orderBy('id', 'ASC')->paginate(15);
        return view('admin.server.index', ['servers' => $servers]);
    }

    public function brasil()
    {
        $servers = Server::orderBy('id', 'ASC')->paginate(15);
        return view('admin.server.brasil', ['servers' => $servers]);
    }

    public function create()
    {
        return view('admin.server.create');
    }

    public function store(ServerFormRequest $request)
    {
        $validatedData = $request->validated();

        $server = new Server;
        $server->name = $validatedData['name'];
        $server->memory = $validatedData['memory'];
        $server->vcpu = $validatedData['vcpu'];
        $server->type_storage = $validatedData['type_storage'];
        $server->amount_storage = $validatedData['amount_storage'];
        $server->system = $validatedData['system'];
        $server->locale = $validatedData['locale'];
        $server->price = $validatedData['price'];
        $server->stock = $request->stock == true ? '1':'0';

        $server->save();
        return redirect()->route('admin-servers')->with('message', 'Servidor criado com sucesso!');
    }

    public function edit(Server $server)
    {
        return view('admin.server.edit', compact('server'));
    }

    public function update(ServerFormRequest $request, $server)
    {
        $server = Server::findOrFail($server);

        $validatedData = $request->validated();

        $server->name = $validatedData['name'];
        $server->memory = $validatedData['memory'];
        $server->vcpu = $validatedData['vcpu'];
        $server->type_storage = $validatedData['type_storage'];
        $server->amount_storage = $validatedData['amount_storage'];
        $server->system = $validatedData['system'];
        $server->locale = $validatedData['locale'];
        $server->price = $validatedData['price'];
        $server->stock = $request->stock == true ? '1':'0';

        $server->update();

        return redirect()->route('admin-servers')->with('message', $server->name.' atualizado com sucesso!');
    }

    public function destroy($server_id)
    {
        $server = Server::findOrFail($server_id);
        $server->delete();
    
        return redirect()->back()->with('message', 'Servidor deletado com sucesso!');
    }
}
