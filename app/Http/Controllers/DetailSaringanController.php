<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailSaringan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DetailSaringanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saringan.create');
    }

    public function congratulation()
    {
        return view('saringan.congratulation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'full_name' => 'required',
            'country' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'passport_number' => 'required|unique:registrations,passport_number', 
            // 'country_code' => 'required',
            'whatsapp_number' => 'required',
            'email' => 'required',
            'permanent_address' => 'required',
            'participation' => 'required',
            'photo' => 'required',
            'passport_image' => 'required'
        ]);
        

        try {


            $saringanDetail = new DetailSaringan();
            $saringanDetail->type = 'International';
            $saringanDetail->category = $request->category;
            $saringanDetail->full_name = $request->full_name;
            $saringanDetail->country = $request->country;
            $saringanDetail->nationality = $request->nationality;
            $saringanDetail->gender = $request->gender;
            $saringanDetail->birth_date = $request->birth_date;
            $saringanDetail->passport_number = $request->passport_number;
            // $saringanDetail->country_code = $request->country_code;
            $saringanDetail->whatsapp_number = $request->whatsapp_number;
            $saringanDetail->email = $request->email;
            $saringanDetail->permanent_address = $request->permanent_address;
            $saringanDetail->participation = $request->participation;
            $saringanDetail->country_representation = $request->country_representation;
            $saringanDetail->participation_year = $request->participation_year;
            $saringanDetail->ranking = $request->ranking;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoExtension = $photo->getClientOriginalExtension();
                
                $photoName = time() . '.' . $photoExtension;
                $photoPath = $photo->storeAs('photos', $photoName, 'public');
                $saringanDetail->photo = url('storage/' . $photoPath); 
            }

            if ($request->hasFile('passport_image')) {
                $passport_image = $request->file('passport_image');
                $passport_imageExtension = $passport_image->getClientOriginalExtension();
                
                $passport_imageName = time() . '.' . $passport_imageExtension;
                $passport_imagePath = $passport_image->storeAs('passportImages', $passport_imageName, 'public');
                
                $saringanDetail->passport_image = url('storage/' . $passport_imagePath); 
            }            


            $saringanDetail->save();

            return redirect()->route('saringan.congratulation')->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('saringan.create')->with('error', 'Data unable to save');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCountryCodes()
    {
        $json = file_get_contents(public_path('json/CountryCodes.json'));
        return response()->json(json_decode($json));

        dd($json);
    }

    public function getExistingUserDetail()
    {
        $existingUserDetail = DetailSaringan::select('passport_number', 'email', 'whatsapp_number')->get();
        
        return response()->json($existingUserDetail);
    }

}
