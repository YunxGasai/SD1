<?php

namespace App\Http\Controllers;

use App\Support\FakeData;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index', [
            'conferences' => FakeData::conferences(),
        ]);
    }

    public function show($id)
    {
        $c = FakeData::conferenceById($id);
        if ($c === null) {
            abort(404);
        }

        return view('employee.show', [
            'conference' => $c,
            'registrations' => FakeData::registrationsForConference($id),
        ]);
    }
}
