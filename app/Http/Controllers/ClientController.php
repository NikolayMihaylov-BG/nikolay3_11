<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Partner;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.clients.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $this->clientService->createUpdate($request->validated());

        return redirect()->route('clients.index')->with('success', 'Клиентът е създаден.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $client)
    {
        return view('admin.pages.clients.create-edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Partner $client)
    {
        $this->clientService->createUpdate($request->validated(), $client);

        return redirect()->route('clients.index')->with('success', 'Клиентът е обновен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $client)
    {
        $this->clientService->delete($client);

        return redirect()->route('clients.index')->with('success', 'Клиентът е изтрит.');
    }

    public function datatable(): JsonResponse
    {
        return $this->clientService->datatable();
    }
}
