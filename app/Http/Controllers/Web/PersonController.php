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
    public function edit(Person $person)
    {
        return view('pages.edit-person')->with(compact('person'));
    }


    public function update(PersonRequest $request, Person $person)
    {
        $personData = $request->all();
        $this->person->fill($personData);
        $this->person->update();

        if (isset($personData['email'])) {
            $person->personEmails()->delete();
            foreach ($personData['email'] as $email) {
                if($email) {
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

        $message = 'Success person data is update!';
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
