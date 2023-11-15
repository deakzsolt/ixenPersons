<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return mixed
     */
    public function getAllPersons()
    {
        return $this->person->orderBy('id', 'desc')->with('PersonEmails', 'PersonMobiles', 'PersonTelephones')->get();
    }

    /**
     * @param Person $person
     *
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getPerson(Person $person)
    {
        return $this->person->with('PersonEmails', 'PersonMobiles', 'PersonTelephones')->find($person->id);
    }
}
