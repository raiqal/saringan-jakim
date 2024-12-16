@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Ex: Noor Ali Ahmed Mooalem" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="country">Represent Country</label>
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
                                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Ex: Arabian" required>
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
                                    <input type="text" class="form-control" name="passport_number" id="passport_number" placeholder="Ex: A54362P" required>
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
                                    <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" placeholder="Ex: 123456789" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ex: aalimooalem@gmail.com" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Ex : 67/C, Ras Al Akhdar Area, Abu Dhabi, United Arab Emirates" required>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="edit-profile-picture" class="form-label">Picture Card</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" id="edit-profile-picture" class="form-control" aria-describedby="edit-profile-picture">
                                </div>
                            </div>
                            

                            <!-- Image Cropping Section -->
                            <div class="row mb-3" id="showImage" style="display: none;">
                                <div class="col-md-12">
                                    <div class="border p-3">
                                        <div id="croppie" class="mt-2">
                                            <img src="" alt="">
                                        </div>
                                        <a href="javascript:;" class="btn btn-primary mt-3" id="crop">Crop</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Cropped Image Section -->
                            <div class="row mb-3" id="showCroppedImage" style="display: none;">
                                <div class="col-md-12">
                                    <p class="bold"><strong>Cropped Picture</strong></p>
                                    <div id="result_image" >
                                        <img src="" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex justify-content-start">
                                <div class="col-4">
                                    <label for="passport_image" class="form-label">Passport Card</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="passport_image" id="passport_image" required>
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
            width: '100%' 
        });

        $('#country_code').select2({
            placeholder: 'Select a country code',
            allowClear: true,
            width: '100%'
        });

        $('#gender').select2({
            placeholder: 'Select gender',
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
            const emailInput = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

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

            if (!emailRegex.test(emailInput.value)) {
                event.preventDefault();  // Prevent form submission if email is invalid
                Swal.fire({
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address.',
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let croppieInstance;

        const editProfilePicture = document.getElementById("edit-profile-picture");
        const showImage = document.getElementById("showImage");
        const cropButton = document.getElementById("crop");
        const showCroppedImage = document.getElementById("showCroppedImage");
        const resultImage = document.getElementById("result_image");
        const uploadPicture = document.getElementById("uploadpicture");
        const uploadCancel = document.getElementById("uploadcancel");

        editProfilePicture.addEventListener("change", function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    if (croppieInstance) {
                        croppieInstance.destroy();
                    }

                    const croppieElement = document.getElementById("croppie");
                    croppieInstance = new Croppie(croppieElement, {
                        boundary: { width: 200, height: 200 },
                        viewport: { width: 300, height: 300, type: "square" },
                    });

                    croppieInstance.bind({ url: e.target.result });
                    showImage.style.display = "block";
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        cropButton.addEventListener("click", function () {
            croppieInstance.result({ type: "base64" }).then(function (dataImg) {
                resultImage.innerHTML = `<img src="${dataImg}" class="img-fluid" />`;
                showImage.style.display = "none";
                showCroppedImage.style.display = "block";
                uploadPicture.style.display = "inline-block";
                uploadCancel.style.display = "inline-block";
            });
        });

        uploadPicture.addEventListener("click", function () {
            const fileExtension = ".jpg";
            const filename = 'profile_picture' + fileExtension; // You can name the file whatever fits your logic
            const dataURL = resultImage.querySelector("img").src;
            const fileUpload = dataURLtoFile(dataURL, filename);

            const formData = new FormData();
            formData.append("uploadFile", fileUpload);

            fetch('/updateProfile_Picture', {  // Adjust the endpoint accordingly
                method: "POST",
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message || "Profile picture updated successfully.");
                    if (data.type !== "error") {
                        location.reload();
                    }
                })
                .catch((error) => {
                    console.error(error);
                    alert("An error occurred while updating the profile picture.");
                });
        });

        function dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(",");
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);

            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }

            return new File([u8arr], filename, { type: mime });
        }
    });
</script>







  

    
