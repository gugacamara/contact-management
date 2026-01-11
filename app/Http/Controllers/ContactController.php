<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;


/**
 * Controller for managing contacts (CRUD).
 *
 * Handles listing, creating, updating, showing, and deleting contacts.
 */
class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    protected $service;

    /**
     * ContactController constructor.
     *
     * @param ContactService $service
     */
    public function __construct(ContactService $service)
    {
        $this->middleware('auth')->except(['index']);
        $this->service = $service;
    }

    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = $this->service->getAll();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param StoreContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContactRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contato criado!');
    }

    /**
     * Display the specified contact.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contact = $this->service->getById($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = $this->service->getById($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     *
     * @param UpdateContactRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('contacts.show', $id)->with('success', 'Contato atualizado!');
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('contacts.index')->with('success', 'Contato excluído!');
    }
}