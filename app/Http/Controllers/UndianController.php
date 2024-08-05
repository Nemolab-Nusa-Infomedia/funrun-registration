<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UndianController extends Controller
{
    public function Undi(){
        return view('welcome');
    }
    public function PemenangUndian()
    {
        $participants = User::whereNotNull('participant_number')->where('is_hangus', false)->pluck('participant_number')->toArray();
        $winner = null;

        if (!empty($participants)) {
            $participantCount = count($participants);
            $shuffleIterations = ceil($participantCount / 100);
            for ($i = 0; $i < $shuffleIterations; $i++) {
                shuffle($participants);
            }
            $winnerNumber = $participants[array_rand($participants)];
            $winner = User::where('participant_number', $winnerNumber)->first();
        }

        return response()->json($winner);
    }

    public function HangusUndian(Request $request){
        $user = User::where('participant_number', $request->participant_number)->first();
        if ($user) {
            $user->update(['is_hangus' => true]);
            return response()->json(['message' => 'Peserta telah dihanguskan.']);
        }
        return response()->json(['message' => 'Peserta tidak ditemukan.'], 404);
    }
}
