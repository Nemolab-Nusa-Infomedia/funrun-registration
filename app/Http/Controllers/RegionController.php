<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getKabupaten($provId){
        $regencies = Regency::where('province_id', $provId)->distinct()->get();
        return response()->json($regencies);
    }

    public function getKecamatan($kecId){
        $district = District::where('regency_id', $kecId)->distinct()->get();
        return response()->json($district);
    }
    public function getDesa($desaId){
        $village = Village::where('district_id', $desaId)->distinct()->get();
        return response()->json($village);
    }
}
