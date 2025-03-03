@extends('layouts.app')

@section('content')
<div class="container ">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-header">
                  <div>
                      <h5>Participation Form</h5>
                  </div>
              </div>

              <div class="card-body">
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success" role="alert">
                          {{ $message }}
                      </div>
                  @endif

                  @if ($message = Session::get('error'))
                      <div class="alert alert-danger" role="alert">
                          {{ $message }}
                      </div>
                  @endif
            <form  method="POST" action="{{ route('saringan.store') }}" enctype="multipart/form-data"> 
              @csrf
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Photo</h5>
                                <div class="col-md-12">
                                    <input type="file" id="picture" class="form-control" aria-describedby="picture" required>
                                    <input type="hidden" name="photo" id="photo">
                                </div>
                                <br>
                                <div class="row mb-3" id="showImage" style="display: none;">
                                    <div class="col-md-12 d-flex flex-column align-items-center">
                                        <div id="croppie" class="mt-2">
                                            <img src="" alt="" class="img-fluid">
                                        </div>
                                        <a href="javascript:;" class="btn btn-primary mt-3" id="crop">Crop</a>
                                    </div>
                                </div>
                                <div class="row mb-3" id="showCroppedImage" style="display: none;">
                                    <div class="col-md-12 d-flex flex-column align-items-center">
                                        <div id="result_image" class="border p-3 d-inline-block">
                                            <img src="" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Passport</h5>
                                <div class="mb-3">
                                    <input type="file" id="edit-passport" class="form-control" aria-describedby="edit-passport" required>
                                    <input type="hidden" name="passport_image" id="passport_image">
                                </div>
                                <div class="row mb-3" id="showPassportImage" style="display: none;">
                                    <div class="col-md-12 d-flex flex-column align-items-center">
                                        <div id="passport-croppie" class="mt-2">
                                            <img src="" alt="" class="img-fluid">
                                        </div>
                                        <a href="javascript:;" class="btn btn-primary mt-3" id="cropPassport">Crop</a>
                                    </div>
                                </div>
                                <div class="row mb-3" id="showCroppedPassportImage" style="display: none;">
                                    <div class="col-md-12 d-flex flex-column align-items-center">
                                        <div id="passport-result_image" class="border p-3 d-inline-block">
                                            <img src="" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">File</h5>
                                <div class="mb-3">
                                    <input type="file" name="file" id="file" class="form-control" aria-describedby="file" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Other</h5>
                            <br>
                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <div class="col-md-6">
                                        <label for="category">Category</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="category_recital" value="Recital" required>
                                        <label class="form-check-label" for="category_recital">Recital</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="category_memorisation" value="Memorisation" required>
                                        <label class="form-check-label" for="category_memorisation">Memorisation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                        <label for="full_name">Full Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="country">Represent Country</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="sapik form-control custom-dropdown" name="country" id="country" required>
                                        <option value="" disabled selected>Select country</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="nationality">Nationality</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control custom-dropdown" name="gender" id="gender" required>
                                        <option value="" disabled selected></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="birth_date">Birth Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="birth_date" id="birth_date" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="passport_number">Passport Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="passport_number" id="passport_number" placeholder="Passport Number" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="country_code">Whatsapp Number</label>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control custom-dropdown" name="country_code" id="country_code" >
                                        <option value="" disabled selected>Country code</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" placeholder="Whatsapp Number" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="participation">Have you ever participated in this event?</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="participation" id="participation_yes" value="Yes" required>
                                        <label class="form-check-label" for="participation_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="participation" id="participation_no" value="No" required>
                                        <label class="form-check-label" for="participation_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div id="additional-fields" style="display: none;">
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="country_representation">Country Representation</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control custom-dropdown" name="country_representation" id="country_representation">
                                            <option value="" disabled selected>Select country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="participation_year">Participation Year</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control" name="participation_year" id="participation_year">
                                            <option value="">Select year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="ranking">Ranking</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="ranking" id="ranking" placeholder="Ranking" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
      </div>
    </div>
  </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {

        let fields = ["full_name", "passport_number", "nationality", "permanent_address"];

        fields.forEach(function(id) {
            let inputField = document.getElementById(id);
            if (inputField) {
                inputField.addEventListener("input", function() {
                    this.value = this.value.toUpperCase();
                });
            }
        });

        $('#country').select2({
            placeholder: 'Select country',
            allowClear: true,
            width: '100%' 
        });

        $('#country_code').select2({
            placeholder: 'Select country code',
            allowClear: true,
            width: '100%'
        });

        $('#gender').select2({
            placeholder: 'Select gender',
            allowClear: true,
            width: '100%'
        });

        $('#country_representation').select2({
            placeholder: 'Select country',
            allowClear: true,
            width: '100%'
        });

        $('#participation_year').select2({
            placeholder: 'Select year',
            allowClear: true,
            width: '100%'
        });

        fetch('/existing_user_detail')
            .then(response => response.json())
            .then(data => {
                data.forEach(passportNumber => console.log(passportNumber));
            })
            .catch(error => console.error('Error fetching data:', error));
        
        fetch('/country_code')
        .then(response => response.json())
        .then(data => {
            const countrySelect = $('#country');
            const countryRepresentationSelect = $('#country_representation');
            const countryCodeSelect = $('#country_code');
            const whatsappNumberInput = document.getElementById('whatsapp_number');

            const countryCodes = data.reduce((acc, country) => {
                acc[country.name] = country.dial_code;
                return acc;
            }, {});

            data.sort((a, b) => a.name.localeCompare(b.name));

            data.forEach(({ name, dial_code, image }) => {
                const countryOption = new Option(name, name);
                countrySelect.append(countryOption);

                const codeOption = new Option(`${dial_code}`, dial_code);
                $(codeOption).data('image', image); 
                countryCodeSelect.append(codeOption);

                const representationOption = new Option(name, name);
                countryRepresentationSelect.append(representationOption);
            });

            countrySelect.on('change', function () {
                const selectedCountry = $(this).val();
                const countryCode = countryCodes[selectedCountry];
                if (countryCode) {
                    $('#country_code').val(countryCode).trigger('change');
                }
            });

            $('#country_code').on('change', function () {
                const selectedCountryCode = $(this).val();
            });

            countryCodeSelect.select2({
                templateResult: formatFlagOption,
                templateSelection: formatFlagOption
            });

            function formatFlagOption(option) {
                if (!option.id) return option.text; 
                const image = $(option.element).data('image'); 
                if (image) {
                    return $(`<span><img src="${image}" style="width: 20px; height: 15px; margin-right: 10px;" />${option.text}</span>`);
                }
                return option.text;
            }
        })
        .catch(error => console.error('Error fetching countries:', error));



        const participationYear = document.getElementById('participation_year');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= 2000; year--) {
            participationYear.add(new Option(year, year));
        }

        const form = document.querySelector('form');
        form.addEventListener('submit', event => {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C853',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });

        const additionalFields = document.getElementById('additional-fields');
        document.getElementById('participation_yes').addEventListener('change', () => {
            additionalFields.style.display = 'block';
        });
        document.getElementById('participation_no').addEventListener('change', () => {
            additionalFields.style.display = 'none';
        });

        const whatsappInput = document.getElementById('whatsapp_number');
        whatsappInput.addEventListener('input', function(event) {
        let inputValue = event.target.value;

        inputValue = inputValue.replace(/[^0-9+\s]/g, '');

        event.target.value = inputValue;
        });

        let existingUserDetails = [];
        fetch('/existing_user_detail')
            .then(response => response.json())
            .then(data => existingUserDetails = data)
            .catch(error => console.error('Error fetching user details:', error));

        form.addEventListener('submit', event => {
            const passportInput = document.getElementById('passport_number').value.trim();
            const emailInput = document.getElementById('email').value.trim();
            const whatsappInput = document.getElementById('whatsapp_number').value.trim();

            const duplicateCheck = [
                { field: 'passport_number', value: passportInput, message: 'This passport number already exists.' },
                { field: 'email', value: emailInput, message: 'This email is already registered.' },
                { field: 'whatsapp_number', value: whatsappInput, message: 'This WhatsApp number is already registered.' }
            ];

            for (const { field, value, message } of duplicateCheck) {
                if (existingUserDetails.find(user => user[field] === value)) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Error',
                        text: message,
                        icon: 'error',
                        confirmButtonColor: '#00C853',
                        confirmButtonText: 'Ok'
                    });
                    return;
                }
            }
        });

        let profileCroppieInstance, passportCroppieInstance;

        const editProfilePicture = document.getElementById("picture");
        const showImage = document.getElementById("showImage");
        const cropButton = document.getElementById("crop");
        const showCroppedImage = document.getElementById("showCroppedImage");
        const resultImage = document.getElementById("result_image");

        const editPassportPicture = document.getElementById("edit-passport");
        const showPassportImage = document.getElementById("showPassportImage");
        const cropPassportButton = document.getElementById("cropPassport");
        const showCroppedPassportImage = document.getElementById("showCroppedPassportImage");
        const passportResultImage = document.getElementById("passport-result_image");

        function validateImage(file) {
            const validImageTypes = ["image/jpeg", "image/png", "image/jpg"];
            if (!validImageTypes.includes(file.type)) {
                Swal.fire({
                    title: "Invalid File",
                    text: "Only JPG, JPEG, and PNG images are allowed.",
                    icon: "error",
                    confirmButtonColor: "#00C853",
                    confirmButtonText: "Ok"
                });
                return false;
            }
            if (file.size > 5 * 1024 * 1024) {
                Swal.fire({
                    title: "File Too Large",
                    text: "The uploaded file must not exceed 5MB.",
                    icon: "error",
                    confirmButtonColor: "#00C853",
                    confirmButtonText: "Ok"
                });
                return false;
            }
            return true;
        }

        editProfilePicture.addEventListener("change", function () {
            const file = this.files[0];
            if (!file || !validateImage(file)) {
                this.value = ""; 
                return;
            }

            showCroppedImage.style.display = "none";
            resultImage.innerHTML = "";
            showImage.style.display = "none";
            if (profileCroppieInstance) profileCroppieInstance.destroy();

            const reader = new FileReader();
            reader.onload = function (e) {
                const croppieElement = document.getElementById("croppie");
                profileCroppieInstance = new Croppie(croppieElement, {
                    boundary: { width: 300, height: 300 },
                    viewport: { width: 300, height: 300, type: "square" },
                });
                profileCroppieInstance.bind({ url: e.target.result });
                showImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        });

        cropButton.addEventListener("click", function () {
            if (profileCroppieInstance) {
                profileCroppieInstance.result({ type: "base64" }).then(function (dataImg) {
                    resultImage.innerHTML = `<img src="${dataImg}" class="img-fluid" />`;
                    showImage.style.display = "none";
                    showCroppedImage.style.display = "block";
                    document.getElementById('photo').value = dataImg;
                });
            }
        });

        editPassportPicture.addEventListener("change", function () {
            const file = this.files[0];
            if (!file || !validateImage(file)) {
                this.value = ""; 
                return;
            }

            showCroppedPassportImage.style.display = "none";
            passportResultImage.innerHTML = "";
            showPassportImage.style.display = "none";
            if (passportCroppieInstance) passportCroppieInstance.destroy();

            const reader = new FileReader();
            reader.onload = function (e) {
                const croppieElement = document.getElementById("passport-croppie");
                passportCroppieInstance = new Croppie(croppieElement, {
                    boundary: { width: 300, height: 300 },
                    viewport: { width: 300, height: 300, type: "square" },
                });
                passportCroppieInstance.bind({ url: e.target.result });
                showPassportImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        });

        cropPassportButton.addEventListener("click", function () {
            if (passportCroppieInstance) {
                passportCroppieInstance.result({ type: "base64" }).then(function (passportImg) {
                    passportResultImage.innerHTML = `<img src="${passportImg}" class="img-fluid" />`;
                    showPassportImage.style.display = "none";
                    showCroppedPassportImage.style.display = "block";
                    document.getElementById('passport_image').value = passportImg;
                });
            }
        });

        function validateFile(file){
            const validFileTypes = ["application/pdf", 
                           "application/msword", 
                           "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
            if (!validFileTypes.includes(file.type)) {
                Swal.fire({
                    title: "Invalid File",
                    text: "Only PDF files are allowed.",
                    icon: "error",
                    confirmButtonColor: "#00C853",
                    confirmButtonText: "Ok"
                });
                return false;
            }
            if (file.size > 5 * 1024 * 1024) {
                Swal.fire({
                    title: "File Too Large",
                    text: "The uploaded file must not exceed 5MB.",
                    icon: "error",
                    confirmButtonColor: "#00C853",
                    confirmButtonText: "Ok"
                });
                return false;
            }
            return true;
        }

        const fileInput = document.getElementById("file");
        fileInput.addEventListener("change", function () {
            const file = this.files[0];
            if (!file || !validateFile(file)) {
                this.value = ""; 
                return;
            }
        });

        
        
    });
</script>


