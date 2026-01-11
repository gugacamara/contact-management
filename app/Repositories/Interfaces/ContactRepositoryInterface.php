<?php

namespace App\Repositories\Interfaces;


/**
 * Interface for contact data access.
 *
 * Defines methods for retrieving, creating, updating, and deleting contacts.
 */
interface ContactRepositoryInterface
{
    /**
     * Get all contacts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Find a contact by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a contact.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id);
}