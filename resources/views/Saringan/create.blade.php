@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h5>Registration For Participant</h5>
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

                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="category">Category</label>
                                </div>
                                <div class="col-md-6">
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
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="full_name">Full Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="full_name" id="full_name" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="country">Country</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control custom-dropdown" name="country" id="country" required>
                                        <option value="" disabled selected>Select a country</option>
                                    </select>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="nationality">Nationality</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nationality" id="nationality" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control custom-dropdown" name="gender" id="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            
            
                             <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="birth_date">Birth Date</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="birth_date" id="birth_date" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="passport_number">Passport Number</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="passport_number" id="passport_number" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="whatsapp_number">WhatsApp Number</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" required>
                                </div>
                            </div>

                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="photo">Photo</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="photo" id="photo" required>
                                </div>
                            </div>
            
                           <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="passport_image">Passport Image</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="passport_image" id="passport_image" required>
                                </div>
                            </div>
            
                            <div class="form-row mb-3 d-flex justify-content-between">
                                <div class="col-md-6">
                                    <label for="participation">Have you ever participated in this event?</label>
                                </div>
                                <div class="col-md-6">
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
                                <div class="form-row mb-3 d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <label for="country_representation">Country Representation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control custom-dropdown" name="country_representation" id="country_representation">
                                            <option value="" disabled selected>Select a country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row mb-3 d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <label for="participation_year">Participation Year</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="participation_year" id="participation_year">
                                            <option value="">Select a year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row mb-3 d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <label for="ranking">Ranking</label>
                                    </div>
                                    <div class="col-md-6">
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
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Country Select Options
        fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
            const countrySelect = document.getElementById('country');
            const countryRepresentationSelect = document.getElementById('country_representation');
            
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            
            data.forEach(country => {
                const option = document.createElement('option');
                let countryName = country.name.common;
                
                option.value = countryName;
                option.textContent = countryName;
                
                countrySelect.appendChild(option.cloneNode(true)); 
                countryRepresentationSelect.appendChild(option);   
            });
        })
        .catch(error => console.error('Error fetching countries:', error));
        
        // Initialize Participation Year Options
        const participationYear = document.getElementById('participation_year');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= 2000; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            participationYear.appendChild(option);
        }
    
        // Form Submission with Confirmation
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
    
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C853',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                }
            });
        });
    
        // Show/Hide Additional Fields Based on Participation Choice
        const participationYes = document.getElementById('participation_yes');
        const participationNo = document.getElementById('participation_no');
        const additionalFields = document.getElementById('additional-fields');
    
        additionalFields.style.display = 'none';
    
        participationYes.addEventListener('change', function() {
            if (participationYes.checked) {
                additionalFields.style.display = 'block';
            }
        });
    
        participationNo.addEventListener('change', function() {
            if (participationNo.checked) {
                additionalFields.style.display = 'none';
            }
        });
    
        // File Validation for Photo and Passport Image
        const allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg']; 
        const maxFileSize = 2 * 1024 * 1024;
    
        form.addEventListener('submit', function (event) {
            event.preventDefault(); 
    
            const photoInput = document.getElementById('photo');
            const passportImageInput = document.getElementById('passport_image');
    
            const photoFile = photoInput.files[0];
            const passportImageFile = passportImageInput.files[0];
    
            if (photoFile && !isValidFile(photoFile)) {
                Swal.fire({
                    title: 'Invalid Photo File',
                    text: 'Please upload a valid image (JPEG, PNG) and the file size should not exceed 2MB.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
    
            if (passportImageFile && !isValidFile(passportImageFile)) {
                Swal.fire({
                    title: 'Invalid Passport Image File',
                    text: 'Please upload a valid image (JPEG, PNG) and the file size should not exceed 2MB.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
    
            Swal.fire({
                // title: 'Are you sure?',
                text: 'Are you sure you want to submit the form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C853',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    
        function isValidFile(file) {
            const isValidType = allowedFileTypes.includes(file.type);
            const isValidSize = file.size <= maxFileSize;
            return isValidType && isValidSize;
        }
        
        });
        document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const whatsappNumberInput = document.getElementById('whatsapp_number');

        form.addEventListener('submit', function (event) {
            const whatsappNumber = whatsappNumberInput.value.trim();
            const phoneNumberPattern = /^[0-9]+$/; 

            if (!phoneNumberPattern.test(whatsappNumber)) {
                event.preventDefault(); 
                Swal.fire({
                    title: 'Invalid Phone Number',
                    text: 'Please enter a valid phone number (numbers only)',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
        });
    });
</script>
    
