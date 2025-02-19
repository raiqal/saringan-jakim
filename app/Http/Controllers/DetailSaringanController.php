<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailSaringan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DetailSaringanController extends Controller
{
    public function create()
    {
        return view('SaringanJakim.create');
    }

    public function congratulation()
    {
        return view('SaringanJakim.congratulation');
    }

     public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required',
            'full_name' => 'required',
            'country' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required',
            'whatsapp_number' => 'required',
            'email' => 'required',
            'permanent_address' => 'required',
            'participation' => 'required',
        ]);

        try {
            $saringanDetail = new DetailSaringan();
            $saringanDetail->type = 'International';
            $saringanDetail->year = date('Y');
            $saringanDetail->category = $request->category;
            $saringanDetail->full_name = $request->full_name;
            $saringanDetail->country = $request->country;
            $saringanDetail->nationality = $request->nationality;
            $saringanDetail->gender = $request->gender;
            $saringanDetail->birth_date = $request->birth_date;
            $saringanDetail->passport_number = $request->passport_number;
            $saringanDetail->country_code = $request->country_code;
            $saringanDetail->whatsapp_number = $request->whatsapp_number;
            $saringanDetail->email = $request->email;
            $saringanDetail->permanent_address = $request->permanent_address;
            $saringanDetail->participation = $request->participation;
            $saringanDetail->country_representation = $request->country_representation;
            $saringanDetail->participation_year = $request->participation_year;
            $saringanDetail->ranking = $request->ranking;

            if ($request->has('photo')) {
                $cropped_picture = $request->photo;
                $cropped_pictureData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $cropped_picture));
                $cropped_pictureName = time() . '.png';
                $cropped_picturePath = 'photos/' . $cropped_pictureName;
                Storage::disk('public')->put($cropped_picturePath, $cropped_pictureData);

                $saringanDetail->photo = url('storage/' . $cropped_picturePath); 
            }

            if ($request->has('passport_image')) {
                $cropped_passport = $request->passport_image;
                $cropped_passportData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $cropped_passport));
                $cropped_passportName = time() . '.png';
                $cropped_passportPath = 'passportImages/' . $cropped_passportName;
                Storage::disk('public')->put($cropped_passportPath, $cropped_passportData);

                $saringanDetail->passport_image = url('storage/' . $cropped_passportPath); 
            }
            
            $saringanDetail->save();

            return redirect()->route('saringan.congratulation')->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            
            Log::error($e->getMessage());
            return redirect()->route('saringan.create')->with('error', 'Data unable to save');
        }
    }

    public function getCountryCodes()
    {
        $json = file_get_contents(public_path('json/CountryCodes.json'));
        return response()->json(json_decode($json));

    }

    public function getExistingUserDetail()
    {
        $existingUserDetail = DetailSaringan::select('passport_number', 'email', 'whatsapp_number', 'year')
        ->where('year', date('Y'))
        ->get();
        
        return response()->json($existingUserDetail);
    }

}
