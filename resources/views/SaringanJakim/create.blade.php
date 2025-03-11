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
                                    <small style="font-size: 12px; font-weight: bold; color: black;">
                                        <span style="color: red;">*</span> Only files in JPG, JPEG, or PNG format and file sizes below 5MB are allowed.
                                    </small>
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
                                    <small style="font-size: 12px; font-weight: bold; color: black;">
                                        <span style="color: red;">*</span> Only files in JPG, JPEG, or PNG format and file sizes below 5MB are allowed.
                                    </small>
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
                    </div>
                    

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">File Islamic Body Authorities</h5>
                                        <div class="mb-3">
                                            <input type="file" name="islamic_body_authority_file" id="islamic_body_authority_file" class="form-control" aria-describedby="file" required>
                                            <small style="font-size: 12px; font-weight: bold; color: black;">
                                                <span style="color: red;">*</span> Only files in JPG and file sizes below 5MB are allowed.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">File Malawakil</h5>
                                        <div class="mb-3">
                                            <input type="file" name="malawakil_file" id="malawakil_file" class="form-control" aria-describedby="file" required>
                                            <small style="font-size: 12px; font-weight: bold; color: black;">
                                                <span style="color: red;">*</span> Only files in JPG and file sizes below 5MB are allowed.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <select class="form-control custom-dropdown" name="country" id="country" required>
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
                                        <label for="birth_date">Date of Birth</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="mm-dd-yyyy" required>
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
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
                                        <select class="form-control custom-dropdown" name="country_code" id="country_code" required>
                                            <option value="" disabled selected>Select code</option>
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
@push('scripts')
<script>
$(document).ready(function() {

    var fields = ["full_name", "passport_number", "nationality", "permanent_address","ranking"];
    $.each(fields, function(i, id) {
        $('#' + id).on('input', function() {
            $(this).val($(this).val().toUpperCase());
        });
    });

    $('#birth_date').datepicker({
        format: 'dd-mm-yyyy',
    });

    $('#birth_date').on('input', function () {
        let value = $(this).val().replace(/\D/g, ""); 

        if (value.length > 8) value = value.slice(0, 8);

        let day = value.slice(0, 2);
        let month = value.slice(2, 4);
        let year = value.slice(4, 8);

        if (month > 12) month = "12";
        if (month < 1 && month.length === 2) month = "01";

        if (day.length === 2) {
            let maxDays = 31;
            if (["04", "06", "09", "11"].includes(month)) maxDays = 30; 
            if (month === "02") maxDays = 29; 
            if (day > maxDays) day = maxDays.toString().padStart(2, '0');
            if (day < 1) day = "01";
        }

        let formatted = day;
        if (value.length >= 3) formatted += "/" + month;
        if (value.length >= 5) formatted += "/" + year;

        $(this).val(formatted);
    });


    $('#country').select2({
        placeholder: 'Select country',
        allowClear: true,
        width: '100%'
    });
    $('#country_code').select2({
        placeholder: 'Select code',
        allowClear: true,
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

    $.getJSON('/country_code')
        .done(function(data) {
            var countrySelect = $('#country');
            var countryRepresentationSelect = $('#country_representation');
            var countryCodeSelect = $('#country_code');
            var whatsappNumberInput = $('#whatsapp_number');

            var countryCodes = {};
            $.each(data, function(i, country) {
                countryCodes[country.name] = country.dial_code;
            });

            data.sort(function(a, b) {
                return a.name.localeCompare(b.name);
            });

            $.each(data, function(i, country) {
                var countryOption = new Option(country.name, country.name);
                countrySelect.append(countryOption);

                var codeOption = new Option(country.dial_code, country.dial_code);
                $(codeOption).data('image', country.image);
                countryCodeSelect.append(codeOption);

                var representationOption = new Option(country.name, country.name);
                countryRepresentationSelect.append(representationOption);
            });

            countrySelect.on('change', function() {
                var selectedCountry = $(this).val();
                var countryCode = countryCodes[selectedCountry];
                if (countryCode) {
                    $('#country_code').val(countryCode).trigger('change');
                }
            });

            $('#country_code').on('change', function() {
                var selectedCountryCode = $(this).val();
            });

            countryCodeSelect.select2({
                templateResult: formatFlagOption,
                templateSelection: formatFlagOption
            });

            function formatFlagOption(option) {
                if (!option.id) return option.text;
                var image = $(option.element).data('image');
                if (image) {
                    return $('<span><img src="' + image + '" style="width: 20px; height: 15px; margin-right: 10px;" />' + option.text + '</span>');
                }
                return option.text;
            }
        })
        .fail(function(error) {
            console.error('Error fetching countries:', error);
        });

    var participationYear = $('#participation_year');
    var currentYear = new Date().getFullYear();
    for (var year = currentYear; year >= 2000; year--) {
        participationYear.append($('<option>', { value: year, text: year }));
    }

    var existingUserDetails = [];
    $.getJSON('/existing_user_detail')
        .done(function(data) {
            existingUserDetails = data;
        })
        .fail(function(error) {
            console.error('Error fetching user details:', error);
        });

    $('form').on('submit', function(event) {
        event.preventDefault();

        var birthDateValue = $('#birth_date').val();
        if (!birthDateValue) {
            Swal.fire({
                title: 'Error',
                text: 'Please select a valid birth date.',
                icon: 'error',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'Ok'
            });
            return;
        }

        var parts = birthDateValue.split('-');
        var birthDate = new Date(parts[2], parts[1] - 1, parts[0]); 

        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        var selectedCategory = $('input[name="category"]:checked').val();
        if (selectedCategory === 'Recital') { 
            if (age < 18) {
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, under the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            } else if (age >= 50) { 
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, over the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
        } else if (selectedCategory === 'Memorisation') {
            if (age < 13) {
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, under the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            } else if (age >= 25) {
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, over the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
        }

        var passportInput = $('#passport_number').val().trim();
        var countryCodeInput = $('#country_code').val().trim(); 
        var whatsappInput = $('#whatsapp_number').val().trim();
        var emailInput = $('#email').val().trim();

        var sameCategoryUsers = existingUserDetails.filter(function(user) {
            return user.category === selectedCategory;
        });

        if (sameCategoryUsers.some(user => user.passport_number === passportInput)) {
            Swal.fire({
                title: 'Error',
                text: 'This passport number already exists.',
                icon: 'error',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'Ok'
            });
            return;
        }

        var isDuplicateWhatsApp = sameCategoryUsers.some(user => 
            user.country_code === countryCodeInput && user.whatsapp_number === whatsappInput
        );

        if (isDuplicateWhatsApp) {
            Swal.fire({
                title: 'Error',
                text: 'This WhatsApp number already exists.',
                icon: 'error',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'Ok'
            });
            return;
        }

        if (sameCategoryUsers.some(user => user.email === emailInput)) {
            Swal.fire({
                title: 'Error',
                text: 'This email is already registered.',
                icon: 'error',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'Ok'
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00C853',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.isConfirmed) {
                event.currentTarget.submit();
            }
        });
    });


    $('#participation_yes').on('change', function() {
        $('#additional-fields').show();
    });
    $('#participation_no').on('change', function() {
        $('#additional-fields').hide();
    });

    $('#whatsapp_number').on('input', function() {
        var inputValue = $(this).val();
        inputValue = inputValue.replace(/[^0-9+\s]/g, '');
        $(this).val(inputValue);
    });

    var profileCroppieInstance, passportCroppieInstance;
    var editProfilePicture = $('#picture');
    var showImage = $('#showImage');
    var cropButton = $('#crop');
    var showCroppedImage = $('#showCroppedImage');
    var resultImage = $('#result_image');

    var editPassportPicture = $('#edit-passport');
    var showPassportImage = $('#showPassportImage');
    var cropPassportButton = $('#cropPassport');
    var showCroppedPassportImage = $('#showCroppedPassportImage');
    var passportResultImage = $('#passport-result_image');

    function validateImage(file) {
        var validImageTypes = ["image/jpeg", "image/png", "image/jpg"];
        if ($.inArray(file.type, validImageTypes) === -1) {
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

    editProfilePicture.on('change', function() {
        var file = this.files[0];
        if (!file || !validateImage(file)) {
            $(this).val('');
            return;
        }
        showCroppedImage.hide();
        resultImage.html('');
        showImage.hide();
        if (profileCroppieInstance) { profileCroppieInstance.destroy(); }
        var reader = new FileReader();
        reader.onload = function(e) {
            var croppieElement = $('#croppie')[0];
            profileCroppieInstance = new Croppie(croppieElement, {
                boundary: { width: 300, height: 300 },
                viewport: { width: 300, height: 300, type: "square" }
            });
            profileCroppieInstance.bind({ url: e.target.result });
            showImage.show();
        };
        reader.readAsDataURL(file);
    });

    cropButton.on('click', function() {
        if (profileCroppieInstance) {
            profileCroppieInstance.result({ type: "base64" }).then(function(dataImg) {
                resultImage.html('<img src="' + dataImg + '" class="img-fluid" />');
                showImage.hide();
                showCroppedImage.show();
                $('#photo').val(dataImg);
            });
        }
    });

    editPassportPicture.on('change', function() {
        var file = this.files[0];
        if (!file || !validateImage(file)) {
            $(this).val('');
            return;
        }
        showCroppedPassportImage.hide();
        passportResultImage.html('');
        showPassportImage.hide();
        if (passportCroppieInstance) { passportCroppieInstance.destroy(); }
        var reader = new FileReader();
        reader.onload = function(e) {
            var croppieElement = $('#passport-croppie')[0];
            passportCroppieInstance = new Croppie(croppieElement, {
                boundary: { width: 300, height: 300 },
                viewport: { width: 300, height: 300, type: "square" }
            });
            passportCroppieInstance.bind({ url: e.target.result });
            showPassportImage.show();
        };
        reader.readAsDataURL(file);
    });

    cropPassportButton.on('click', function() {
        if (passportCroppieInstance) {
            passportCroppieInstance.result({ type: "base64" }).then(function(passportImg) {
                passportResultImage.html('<img src="' + passportImg + '" class="img-fluid" />');
                showPassportImage.hide();
                showCroppedPassportImage.show();
                $('#passport_image').val(passportImg);
            });
        }
    });

    function validateFile(file) {
        var validFileTypes = ["application/pdf"];
        if ($.inArray(file.type, validFileTypes) === -1) {
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

    $('#islamic_body_authority_file, #malawakil_file').on('change', function() {
        var file = this.files[0];
        if (!file || !validateFile(file)) {
            $(this).val('');
            return;
        }
    });

});
</script>

@endpush