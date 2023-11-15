<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Services\PersonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class PersonController extends Controller
{
    /** @var PersonService */
    private PersonService $personService;

    /** @var Person */
    private Person $person;

    /**
     * PersonController constructor
     *
     * @param Person        $person
     * @param PersonService $personService
     */
    public function __construct(Person $person, PersonService $personService)
    {
        $this->personService = $personService;
        $this->person = $person;
    }

    /**
     * Returns all persons with relations
     *
     * @return JsonResponse
     */
    public function list()
    {
        return response()->json($this->personService->getAllPersons());
    }

    public function store()
    {

    }

    public function edit(Person $person)
    {
        return response()->json($this->personService->getPerson($person));
    }

    public function update(PersonRequest $request, Person $person)
    {

    }

    /**
     * @param Person $person
     *
     * @return JsonResponse
     */
    public function destroy(Person $person)
    {
        if ($person->delete()) {
            return Response::json(
                [
                    'success' => true,
                ]
            );
        } // if

        return Response::json(
            [
                'success' => false,
            ]
        );
    }
}
