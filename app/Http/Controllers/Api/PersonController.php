<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /** @var PersonService */
    private PersonService $personService;

    /**
     * PersonController constructor
     *
     * @param PersonService $personService
     */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
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

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'         => 'required|min:2|max:255',
            'last_name'          => 'required|min:2|max:255',
            'permanent_address'  => 'required|min:5|max:255',
            'mobile_number.*'    => 'nullable|numeric',
            'telephone_number.*' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages(), 'status' => 400], 200);
        } // if

        return response()->json($this->personService->store($request));
    }

    /**
     * @param Person $person
     *
     * @return JsonResponse
     */
    public function edit(Person $person)
    {
        return response()->json($this->personService->getPerson($person));
    }

    /**
     * @param Request $request
     * @param Person  $person
     *
     * @return JsonResponse
     */
    public function update(Request $request, Person $person)
    {
        $validator = Validator::make($request->all(), [
            'first_name'         => 'required|min:2|max:255',
            'last_name'          => 'required|min:2|max:255',
            'permanent_address'  => 'required|min:5|max:255',
            'mobile_number.*'    => 'nullable|numeric',
            'telephone_number.*' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages(), 'status' => 400], 200);
        } // if

        return response()->json($this->personService->updatePerson($request, $person));
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
