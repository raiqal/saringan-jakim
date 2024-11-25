@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <div>
                            <h5>Participantion Form</h5>
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

                        <form method="POST" action="{{ route('saringan.store') }}" enctype="multipart/form-data">
                            @csrf
                            
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
                                    <input type="text" class="form-control" name="full_name" id="full_name" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="country">Country</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="sapik form-control custom-dropdown" name="country" id="country" required>
                                        <option value="" disabled selected>Select a country</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="nationality">Nationality</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nationality" id="nationality" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control custom-dropdown" name="gender" id="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
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
                                    <input type="text" class="form-control" name="passport_number" id="passport_number" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="country_code">Whatsapp Number</label>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control custom-dropdown" name="country_code" id="country_code" required>
                                        <option value="" disabled selected>Country code</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" required>
                                </div>
                            </div>

                            {{-- <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="whatsapp_number">WhatsApp Number</label>
                                </div>
                                
                            </div> --}}

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="photo">Photo</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" name="photo" id="photo" required>
                                </div>
                            </div>

                            
                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="passport_image">Passport Image</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" name="passport_image" id="passport_image" required>
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
                                            <option value="" disabled selected>Select a country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="participation_year">Participation Year</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control" name="participation_year" id="participation_year">
                                            <option value="">Select a year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="ranking">Ranking</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="ranking" id="ranking">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#country').select2({
            placeholder: 'Select a country',
            allowClear: true,
            width: '100%' // Ensures the width matches the other fields
       // $('.select2-container--open .select2-dropdown').css('z-index', '1050');
        });

        $('#country_code').select2({
            placeholder: 'Select a country code',
            allowClear: true,
            width: '100%'
        });
        $('#country_representation').select2({
            placeholder: 'Select a country',
            allowClear: true,
            width: '100%'
        });

        fetch('/existing_user_detail')
            .then(response => response.json())
            .then(data => {
                // console.log(data);
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
                $(codeOption).data('image', image); // Attach the flag image URL
                countryCodeSelect.append(codeOption);

                const representationOption = new Option(name, name);
                countryRepresentationSelect.append(representationOption);
            });

            countrySelect.on('change', function () {
                const selectedCountry = $(this).val();
                const countryCode = countryCodes[selectedCountry];
                if (countryCode) {
                    $('#country_code').val(countryCode).trigger('change');
                    whatsappNumberInput.value = countryCode;
                }
            });

            $('#country_code').on('change', function () {
                const selectedCountryCode = $(this).val();
                if (selectedCountryCode) whatsappNumberInput.value = selectedCountryCode;
            });

            countryCodeSelect.select2({
                templateResult: formatFlagOption,
                templateSelection: formatFlagOption
            });

            function formatFlagOption(option) {
                if (!option.id) return option.text; 
                const image = $(option.element).data('image'); // Retrieve the flag URL
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

        const allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        const maxFileSize = 2 * 1024 * 1024; 

        function isValidFile(file) {
            return allowedFileTypes.includes(file.type) && file.size <= maxFileSize;
        }

        form.addEventListener('submit', event => {
            const photoFile = document.getElementById('photo').files[0];
            const passportImageFile = document.getElementById('passport_image').files[0];

            if (photoFile && !isValidFile(photoFile)) {
                event.preventDefault();
                Swal.fire({
                    title: 'Invalid Photo File',
                    text: 'Please upload a valid image (JPEG, PNG) and ensure the file size does not exceed 2MB.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }

            if (passportImageFile && !isValidFile(passportImageFile)) {
                event.preventDefault();
                Swal.fire({
                    title: 'Invalid Passport Image File',
                    text: 'Please upload a valid image (JPEG, PNG) and ensure the file size does not exceed 2MB.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
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
    });
</script>

  

    
