<?php

namespace App\Services;

use App\Models\Person;

class PersonService
{
    /** @var Person */
    private Person $person;

    /**
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->person->orderBy('id', 'desc')->get();
    }
}
