<?php

namespace App\Services;

use App\Models\Person;
use App\Models\PersonEmail;
use App\Models\PersonMobile;
use App\Models\PersonTelephone;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $personData = $request->all();
        $this->person->fill($personData);
        $this->person->save();

        if (isset($personData['email'])) {
            foreach ($personData['email'] as $email) {
                $personEmail = new PersonEmail();
                $personEmail->person_id = $this->person->id;
                $personEmail->email = $email;
                $personEmail->save();
            } // foreach
        } // if

        if (isset($personData['mobile_number'])) {
            foreach ($personData['mobile_number'] as $mobile) {
                $personMobile = new PersonMobile();
                $personMobile->person_id = $this->person->id;
                $personMobile->mobile_number = $mobile;
                $personMobile->save();
            } // foreach
        } // if

        if (isset($personData['telephone_number'])) {
            foreach ($personData['telephone_number'] as $telephone) {
                $personTelephone = new PersonTelephone();
                $personTelephone->person_id = $this->person->id;
                $personTelephone->telephone_number = $telephone;
                $personTelephone->save();
            } // foreach
        } // if

        return $this->person->with('PersonEmails', 'PersonMobiles', 'PersonTelephones')->find($this->person->id);
    }

    /**
     * @param Request $request
     * @param Person  $person
     *
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function updatePerson(Request $request, Person $person)
    {

        $personData = $request->all();
        $person->first_name = isset($personData['first_name']) ? $personData['first_name'] : $person->first_name;
        $person->middle_name = isset($personData['middle_name']) ? $personData['middle_name'] : $person->middle_name;
        $person->last_name = isset($personData['last_name']) ? $personData['last_name'] : $person->last_name;
        $person->permanent_address = isset($personData['permanent_address']) ? $personData['permanent_address'] : $person->permanent_address;
        $person->temporary_address = isset($personData['temporary_address']) ? $personData['temporary_address'] : $person->temporary_address;
        $person->save();

        if (isset($personData['email'])) {
            $person->personEmails()->delete();
            foreach ($personData['email'] as $email) {
                if ($email) {
                    $personEmail = new PersonEmail();
                    $personEmail->person_id = $person->id;
                    $personEmail->email = $email;
                    $personEmail->save();
                } // if
            } // foreach
        } // if

        if (isset($personData['mobile_number'])) {
            $person->personMobiles()->delete();
            foreach ($personData['mobile_number'] as $mobile) {
                if ($mobile) {
                    $personMobile = new PersonMobile();
                    $personMobile->person_id = $person->id;
                    $personMobile->mobile_number = $mobile;
                    $personMobile->save();
                } // if
            } // foreach
        } // if

        if (isset($personData['telephone_number'])) {
            $person->personTelephones()->delete();
            foreach ($personData['telephone_number'] as $telephone) {
                if ($telephone) {
                    $personTelephone = new PersonTelephone();
                    $personTelephone->person_id = $person->id;
                    $personTelephone->telephone_number = $telephone;
                    $personTelephone->save();
                } // if
            } // foreach
        } // if

        return $this->person->with('PersonEmails', 'PersonMobiles', 'PersonTelephones')->find($person->id);
    }
}
