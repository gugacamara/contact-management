<?php

namespace App\Services;

use App\Repositories\Interfaces\ContactRepositoryInterface;


/**
 * Service layer for business logic related to contacts.
 *
 * Handles operations such as retrieving, creating, updating, and deleting contacts.
 */
class ContactService
{
    /**
     * @var ContactRepositoryInterface
     */
    protected $repository;

    /**
     * ContactService constructor.
     *
     * @param ContactRepositoryInterface $repository
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all contacts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->repository->all();
    }

    /**
     * Get a contact by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update a contact.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}