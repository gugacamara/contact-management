<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->middleware('auth')->except(['index']);
        $this->service = $service;
    }

    public function index()
    {
        $contacts = $this->service->getAll();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contato criado!');
    }

    public function show($id)
    {
        $contact = $this->service->getById($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = $this->service->getById($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('contacts.show', $id)->with('success', 'Contato atualizado!');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('contacts.index')->with('success', 'Contato excluído!');
    }
}