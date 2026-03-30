<?php

namespace App\Http\Controllers;

use App\Support\FakeData;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index', [
            'conferences' => FakeData::conferencesPlannedOnly(),
        ]);
    }

    public function show($id)
    {
        $c = FakeData::conferenceById($id);
        if ($c === null || $c['is_past']) {
            abort(404);
        }

        return view('client.show', ['conference' => $c]);
    }

    public function registerForm($id)
    {
        $c = FakeData::conferenceById($id);
        if ($c === null || $c['is_past']) {
            abort(404);
        }

        return view('client.register', ['conference' => $c]);
    }

    public function registerStore(Request $request, $id)
    {
        $c = FakeData::conferenceById($id);
        if ($c === null || $c['is_past']) {
            abort(404);
        }

        $v = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        FakeData::saveRegistration($id, $v['name'], $v['email']);

        return redirect()->route('client.conferences.show', $id)->with('status', __('conference.register_ok'));
    }
}
