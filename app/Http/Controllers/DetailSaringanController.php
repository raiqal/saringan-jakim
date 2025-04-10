<?php

namespace App\Http\Controllers;

use App\Models\DetailSaringan;
use Illuminate\Http\Request;
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
        $request->validate([
            'full_name' => 'required',
            'country' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'email' => 'required|email',
            'country_code' => 'required',
            'whatsapp_number' => 'required',
            'permanent_address' => 'required',
            'category' => 'required',
            'participation' => 'required',
            'narration' => 'required',
            'nominating_applicant_country' => 'required',
            'address_applicant_country' => 'required',
            'mobile_applicant_country' => 'required',
            'email_applicant_country' => 'required',
            'nearest_malaysian_embassy' => 'required',
            'photo' => 'required',
            'passport_image' => 'required',
        ]);

        try {
            foreach ($request->category as $category) {
                $saringanDetail = new DetailSaringan();
                $saringanDetail->type = 'International';
                $saringanDetail->full_name = $request->full_name;
                $saringanDetail->country = $request->country;
                $saringanDetail->nationality = $request->nationality;
                $saringanDetail->gender = $request->gender;
                $saringanDetail->birth_date = date('Y-m-d', strtotime($request->birth_date)); 
                $saringanDetail->birth_place = $request->birth_place;
                $saringanDetail->email = $request->email;
                $saringanDetail->country_code = $request->country_code;
                $saringanDetail->whatsapp_number = $request->whatsapp_number;
                $saringanDetail->permanent_address = $request->permanent_address;
                $saringanDetail->year = date('Y');
                $saringanDetail->category = $category;
                $saringanDetail->category_id = ($category == 'Recital') ? 66 : 67;
                $saringanDetail->participation = $request->participation;
                $saringanDetail->participation_year = $request->participation_year;
                $saringanDetail->narration = implode(',', $request->narration); 
                $saringanDetail->other_narration = $request->other_narration ;
                $saringanDetail->nominating_applicant_country = $request->nominating_applicant_country;
                $saringanDetail->address_applicant_country = $request->address_applicant_country;
                $saringanDetail->mobile_applicant_country = $request->mobile_applicant_country;
                $saringanDetail->email_applicant_country = $request->email_applicant_country;
                $saringanDetail->nearest_malaysian_embassy = $request->nearest_malaysian_embassy;

                if ($request->has('photo')) {
                    $photoData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $request->photo));
                    $photoName = uniqid() . '.png';
                    $photoPath = 'photos/' . $photoName;
                    Storage::disk('public')->put($photoPath, $photoData);
                    $saringanDetail->photo = url('storage/' . $photoPath);
                }

                if ($request->has('passport_image')) {
                    $passportData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $request->passport_image));
                    $passportName = uniqid() . '.png';
                    $passportPath = 'passportImages/' . $passportName;
                    Storage::disk('public')->put($passportPath, $passportData);
                    $saringanDetail->passport_image = url('storage/' . $passportPath);
                }

                $saringanDetail->save();
            }

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

    public function getExistingUserDetail(Request $request)
    {
        $existingUserDetail = DetailSaringan::where('year', date('Y'))
            ->where('category', $request->category)
            ->get();
        
        return response()->json($existingUserDetail);
    }

}
