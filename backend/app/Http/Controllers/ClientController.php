<?php

namespace ProjectManager\Http\Controllers;

use Illuminate\Http\Request;

use ProjectManager\Repositories\ClientRepository;
use ProjectManager\Services\ClientService;

class ClientController extends Controller
{
    private $clientRepository;

    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->clientRepository = $repository;

        $this->clientService = $service;
    }

    public function index()
    {
        return $this->clientRepository->all();
    }

    public function update(Request $request, $id)
    {
        return $this->clientService->save($request->all(), $id);
    }
    
    public function store(Request $request)
    {
        return $this->clientService->save($request->all());
    }

    public function show($id)
    {
        return $this->clientRepository->find($id);
    }

    public function destroy($id)
    {
        return $this->clientRepository->destroy($id);
    }


}
