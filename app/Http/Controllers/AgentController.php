<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Repositories\AgentRepository;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    protected $agentRepo;

    public function __construct(AgentRepository $agentRepo)
    {
        $this->agentRepo = $agentRepo;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $kanal = $request->query('kanal');

        $perPage = !empty($request->query('per_page')) ? $request->query('per_page') : 10;
        $orderBy = !empty($request->query('order')) ? 'MdrAgent.'.$request->query('order') : 'MdrAgent.MdrName';
        $direction = !empty($request->query('direction')) ? $request->query('direction') : 'ASC';

        $data = empty($contactId) ? 
            $this->emptyAgent()->paginate($perPage) : 
            $this->agentRepo->getAll(
                filter: [
                    'search' => $search,
                    'kanal' => $kanal,
                ]
            )
            ->orderBy($orderBy, $direction)
            ->paginate($perPage)
            ->through(function ($item, $key) {                
                return $this->agentRepo->mapResponse($item);
            });

        return response()->json($data);
    }

    private function emptyAgent()
    {
        return Agent::whereNull('Id');
    }
}
