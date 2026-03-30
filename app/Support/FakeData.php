<?php

namespace App\Support;

class FakeData
{
    public static function conferences(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Konferencijos pavadinimas 1',
                'description' => 'Trumpas aprašymas apie konferenciją nr. 1.',
                'lecturers' => 'Vardenis Pavardenis',
                'date' => '2026-06-10',
                'time' => '10:00',
                'address' => 'Adresas 12, Vilnius',
                'is_past' => false,
            ],
            [
                'id' => 2,
                'title' => 'Konferencijos pavadinimas 2',
                'description' => 'Trumpas aprašymas apie konferenciją nr. 2.',
                'lecturers' => 'Antras Vardenis',
                'date' => '2025-03-01',
                'time' => '14:00',
                'address' => 'Gatvė 5, Kaunas',
                'is_past' => true,
            ],
            [
                'id' => 3,
                'title' => 'Konferencijos pavadinimas 3',
                'description' => 'Trumpas aprašymas apie konferenciją nr. 3.',
                'lecturers' => 'Trečias Pavardenis',
                'date' => '2026-09-20',
                'time' => '09:30',
                'address' => 'Adresas 8, korpusas B',
                'is_past' => false,
            ],
        ];
    }

    public static function conferenceById($id): ?array
    {
        foreach (self::conferences() as $c) {
            if ($c['id'] == $id) {
                return $c;
            }
        }

        return null;
    }

    public static function conferencesPlannedOnly(): array
    {
        $out = [];
        foreach (self::conferences() as $c) {
            if (! $c['is_past']) {
                $out[] = $c;
            }
        }

        return $out;
    }

    public static function registrationsForConference($conferenceId): array
    {
        $base = [
            ['conference_id' => 1, 'name' => 'Vardenis Pavardenis', 'email' => 'vardenis@pastas.lt'],
            ['conference_id' => 1, 'name' => 'Vardenė Pavardenė', 'email' => 'vardene@pastas.lt'],
            ['conference_id' => 2, 'name' => 'Kitas Vardas', 'email' => 'kitas@pastas.lt'],
            ['conference_id' => 3, 'name' => 'Registracija Vardas', 'email' => 'registracija@pastas.lt'],
        ];
        $extra = session('sd1_reg', []);
        if (! is_array($extra)) {
            $extra = [];
        }
        $all = array_merge($base, $extra);
        $out = [];
        foreach ($all as $r) {
            if ($r['conference_id'] == $conferenceId) {
                $out[] = $r;
            }
        }

        return $out;
    }

    public static function saveRegistration($conferenceId, $name, $email): void
    {
        $extra = session('sd1_reg', []);
        if (! is_array($extra)) {
            $extra = [];
        }
        $extra[] = [
            'conference_id' => $conferenceId,
            'name' => $name,
            'email' => $email,
        ];
        session(['sd1_reg' => $extra]);
    }
}
