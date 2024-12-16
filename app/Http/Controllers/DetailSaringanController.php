<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailSaringan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DetailSaringanController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('saringan.create');
    }

    public function congratulation()
    {
        return view('saringan.congratulation');
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
            'passport_number' => 'required|unique:registrations,passport_number',
            'whatsapp_number' => 'required',
            'email' => 'required',
            'permanent_address' => 'required',
            'participation' => 'required',
            // 'photo' => 'required', // Validate the cropped photo
            // 'cropped_passport_image' => 'required' // Validate the cropped passport image
        ]);

        try {
            // Create a new Saringan detail entry
            $saringanDetail = new DetailSaringan();
            $saringanDetail->type = 'International';
            $saringanDetail->category = $request->category;
            $saringanDetail->full_name = $request->full_name;
            $saringanDetail->country = $request->country;
            $saringanDetail->nationality = $request->nationality;
            $saringanDetail->gender = $request->gender;
            $saringanDetail->birth_date = $request->birth_date;
            $saringanDetail->passport_number = $request->passport_number;
            $saringanDetail->whatsapp_number = $request->whatsapp_number;
            $saringanDetail->email = $request->email;
            $saringanDetail->permanent_address = $request->permanent_address;
            $saringanDetail->participation = $request->participation;
            $saringanDetail->country_representation = $request->country_representation;
            $saringanDetail->participation_year = $request->participation_year;
            $saringanDetail->ranking = $request->ranking;

            // Process the cropped profile picture
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

            // // Process the passport image if it exists
            // if ($request->hasFile('passport_image')) {
            //     $passport_image = $request->file('passport_image');
            //     $passport_imageExtension = $passport_image->getClientOriginalExtension();

            //     $passport_imageName = time() . '.' . $passport_imageExtension;
            //     $passport_imagePath = $passport_image->storeAs('passportImages', $passport_imageName, 'public');

            //     $saringanDetail->passport_image = url('storage/' . $passport_imagePath); 
            // }

            // dd($saringanDetail);

            // Save the Saringan detail
            $saringanDetail->save();

            return redirect()->route('saringan.congratulation')->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            // Log any errors and return a failure message
            Log::error($e->getMessage());
            return redirect()->route('saringan.create')->with('error', 'Data unable to save');
        }
    }

    public function getCountryCodes()
    {
        $json = file_get_contents(public_path('json/CountryCodes.json'));
        return response()->json(json_decode($json));

        // dd($json);
    }

    public function getExistingUserDetail()
    {
        $existingUserDetail = DetailSaringan::select('passport_number', 'email', 'whatsapp_number')->get();
        
        return response()->json($existingUserDetail);
    }

}
