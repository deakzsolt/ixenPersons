<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Models\PersonEmail;
use App\Models\PersonMobile;
use App\Models\PersonTelephone;
use App\Services\PersonService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PersonController extends Controller
{

    /** @var PersonService */
    private PersonService $personService;
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
     * Returns all persons
     *
     * @return Application|Factory|View|FoundationApplication
     */
    public function index()
    {
        $data = $this->personService->list();

        return view('pages.persons')->with(compact('data'));
    }

    /**
     * Shows person create form
     *
     * @return Application|Factory|View|FoundationApplication
     */
    public function create()
    {
        return view('pages.create-person');
    }

    /**
     * Create new Person with additional data
     *
     * @param PersonRequest $request
     *
     * @return Application|Factory|View|FoundationApplication
     */
    public function store(PersonRequest $request)
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

        $message = 'Success new person has been added to the database!';
        return view('pages.success')->with(compact('message'));
    }

    /**
     * @param Person $person
     *
     * @return Application|Factory|View|FoundationApplication
     */
    public function destroy(Person $person)
    {
        $person->delete();

        $message = 'Success the person is deleted!';
        return view('pages.success')->with(compact('message'));
    }
}
