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
            'photo' => 'required',
            'passport_image' => 'required',
            // 'islamic_body_authority_file' => 'required|file|mimes:pdf,doc,docx',
            // 'malawakil_file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        try {
            foreach ($request->category as $category) {
                $saringanDetail = new DetailSaringan();
                $saringanDetail->type = 'International';
                $saringanDetail->year = date('Y');
                $saringanDetail->category = $category;
                $saringanDetail->category_id = ($category == 'Recital') ? 66 : 67;
                $saringanDetail->full_name = $request->full_name;
                $saringanDetail->country = $request->country;
                $saringanDetail->nationality = $request->nationality;
                $saringanDetail->gender = $request->gender;
                $saringanDetail->birth_date = date('Y-m-d', strtotime($request->birth_date)); 
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

                // if ($request->hasFile('islamic_body_authority_file')) {
                //     $file = $request->file('islamic_body_authority_file');
                //     $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                //     $filePath = 'islamic_body_authority_files/' . $fileName;
                //     Storage::disk('public')->put($filePath, file_get_contents($file));
                //     $saringanDetail->islamic_body_authority_file = url('storage/' . $filePath);
                // }

                // if ($request->hasFile('malawakil_file')) {
                //     $file = $request->file('malawakil_file');
                //     $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                //     $filePath = 'malawakil_files/' . $fileName;
                //     Storage::disk('public')->put($filePath, file_get_contents($file));
                //     $saringanDetail->malawakil_file = url('storage/' . $filePath);
                // }

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
