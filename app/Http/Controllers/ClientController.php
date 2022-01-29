<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function getOrder(): JsonResponse
    {
        $client_ordened = Client::orderBy('name')->limit(2)->get();
        return response()->json($client_ordened);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientRequest $request
     * @return JsonResponse
     */
    public function store(StoreClientRequest $request): JsonResponse
    {
        $new_client = Client::create($request->only(Client::$form_data));
        return response()->json($new_client);
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return JsonResponse
     */
    public function show(Client $client): JsonResponse
    {
        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param string $name
     * @return JsonResponse
     */
    public function getName(string $name): JsonResponse
    {
        $client = Client::where('name', $name)->first();
        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param string $names
     * @return View
     */
    public function getNames(string $names = ''): View
    {
        $names = explode(',', $names);
        return view('clients.clients', compact('names'));
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return JsonResponse
     */
    public function getBills(Client $client): JsonResponse
    {
        $bills = $client->bills;
        return response()->json($bills);
    }

    /**
     * Display the specified resource.
     *
     * @param string $text
     * @return JsonResponse
     */
    public function search(string $text): JsonResponse
    {
        $client = Client::where('name', 'LIKE', "%$text%")->get();
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateClientRequest $request
     * @param Client $client
     * @return Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
