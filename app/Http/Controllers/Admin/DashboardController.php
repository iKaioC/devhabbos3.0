<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Recupera a quantidade total de usuários
        $totalUsers = User::where('staff', 0)->count();
    
        // Recupera a quantidade de usuários cadastrados no mês anterior
        $lastMonth = Carbon::now()->subMonth();
        $lastMonthUsers = User::whereBetween('created_at', [$lastMonth->startOfMonth(), $lastMonth->endOfMonth()])->where('staff', 0)->count();
    
        // Calcula a porcentagem de crescimento
        if ($lastMonthUsers > 0) {
            $growthPercentage = (($totalUsers - $lastMonthUsers) / $lastMonthUsers) * 100;
        } else {
            $growthPercentage = 100;
        }

        // Recupera todas as VPS's dos clientes e calcula o total de receita
        $userServers = DB::table('user_server')
        ->join('servers', 'user_server.server_id', '=', 'servers.id')
        ->select('user_server.id', 'user_server.user_id', 'servers.name', 'user_server.created_at', DB::raw('COALESCE(user_server.pay, servers.price) as value'))
        ->get();
    
        $totalServer = 0;
        foreach ($userServers as $servers) {
            $totalServer += str_replace(',', '.', $servers->value);
        }

        // Recupera todas os Habbos dos clientes e calcula o total de receita
        $userHabbos = DB::table('user_habbo')
            ->join('habbos', 'user_habbo.habbo_id', '=', 'habbos.id')
            ->select('user_habbo.id', 'user_habbo.user_id', 'habbos.name', 'user_habbo.created_at', DB::raw('COALESCE(user_habbo.pay, habbos.price) as value'))
            ->get();

        $totalHabbo = 0;
        foreach ($userHabbos as $habbos) {
            $totalHabbo += str_replace(',', '.', $habbos->value);
        }

        $userOptionals = DB::table('user_optional')
            ->join('optionals', 'user_optional.optional_id', '=', 'optionals.id')
            ->whereIn('user_optional.product_type', ['Habbo', 'Windows', 'Outro'])
            ->select('user_optional.id', 'user_optional.user_id', 'optionals.name', 'user_optional.created_at', 'optionals.price')
            ->unionAll(DB::table('user_other_optional')
                ->select('user_other_optional.id', 'user_other_optional.user_id', 'user_other_optional.name', 'user_other_optional.created_at', 'user_other_optional.pay as price'))
            ->get();

        $totalOptional = $userOptionals->sum(function ($optionals) {
            return str_replace(',', '.', $optionals->price);
        });
    
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'growthPercentage' => $growthPercentage,
            'userServers' => $userServers,
            'totalServer' => $totalServer,
            'userHabbos' => $userHabbos,
            'totalHabbo' => $totalHabbo,
            'userOptionals' => $userOptionals,
            'totalOptional' => $totalOptional,
        ]);
    }
}
