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
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Participation Information</h5>
                                <br>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                            <label for="full_name">Full Name <span style="color: red;">*</span></label>
                                        <small class="text-muted">(*according to the passport / identification document)</small>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>  
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="country">Country<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control custom-dropdown" name="country" id="country" required>
                                            <option value="" disabled selected>Select country</option>
                                        </select>
                                    </div>
                                </div>                              
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="nationality">Nationality <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="gender">Sex <span style="color: red;">*</span></label>
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
                                        <label for="birth_date">Date of Birth <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Click or tap here to enter text" required>
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="birth_place">Place of Birth <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="email">Email <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="country_code">Whatsapp Number <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control custom-dropdown" name="country_code" id="country_code" required>
                                            <option value="" disabled selected>Select code</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="permanent_address">Permanent Address <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Click or tap here to enter text" required>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <div class="col-md-6">
                                            <label for="category">Category <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="category[]" id="category_recital" value="Recital">
                                            <label class="form-check-label" for="category_recital">Al-Quran Recitation (Tilawah Mujawwad)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="category[]" id="category_memorisation" value="Memorisation">
                                            <label class="form-check-label" for="category_memorisation">Memorising 30 Juz</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <div class="col-md">
                                            <label for="narration">Narration would you like to recite <span style="color: red;">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="col-md-8 d-flex flex-wrap">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="narration[]" id="hafs" value="Hafs">
                                                <label class="form-check-label" for="hafs">Hafs</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="narration[]" id="warsh" value="Warsh">
                                                <label class="form-check-label" for="warsh">Warsh</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="narration[]" id="qalun" value="Qalun">
                                                <label class="form-check-label" for="qalun">Qalun</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="narration[]" id="al_dury" value="Al-Dury">
                                                <label class="form-check-label" for="al_dury">Al-Dury</label>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                                
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="other_narration">Other Narration</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="other_narration" id="other_narration" placeholder="Click or tap here to enter text">
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-9">
                                        <label for="participation">Have you participated in this competition in the last 3 years in Malaysia? <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-3">
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
                                            <label for="participation_year">Participation Year</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="number" class="form-control" name="participation_year" id="participation_year" placeholder="Click or tap here to enter text">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h5 class="card-title">Applicant’s Country Information</h5>
                                <br>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="nominating_applicant_country">Name of Nominating Applicant’s Country <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="nominating_applicant_country" id="nominating_applicant_country" placeholder="Click or tap here to enter text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="address_applicant_country">Address of Applicant’s Country<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="address_applicant_country" id="address_applicant_country" placeholder="Click or tap here to enter text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="mobile_applicant_country">Mobile<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="mobile_applicant_country" id="mobile_applicant_country" placeholder="Click or tap here to enter text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="email_applicant_country">Email<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="email_applicant_country" id="email_applicant_country" placeholder="Click or tap here to enter text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 d-flex justify-content-start">
                                    <div class="col-4">
                                        <label for="nearest_malaysian_embassy">What is the nearest Malaysian Embassy to you<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md">
                                            <input type="text" class="form-control" name="nearest_malaysian_embassy" id="nearest_malaysian_embassy" placeholder="Click or tap here to enter text" required>
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

    var fields = ["full_name","nationality", "permanent_address", "other_narration", "nominating_applicant_country", "address_applicant_country", "nearest_malaysian_embassy", "birth_place"];
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
        if (value.length >= 3) formatted += "-" + month;
        if (value.length >= 5) formatted += "-" + year;

        $(this).val(formatted);
    });

    $("#mobile_applicant_country").on("input", function () {
        $(this).val($(this).val().replace(/[^0-9+]/g, ""));
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
    $.getJSON('/country_code')
        .done(function(data) {
            var countrySelect = $('#country');
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

        let recitalChecked = $("#category_recital").is(":checked");
        let memorisationChecked = $("#category_memorisation").is(":checked");
        
        if (recitalChecked ) {
            if (age < 18) {
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, under the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
            else if (age > 50) {
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

        if (memorisationChecked) {
            if (age < 13) {
                Swal.fire({
                    title: 'Error',
                    text: 'Sorry, under the age limit.',
                    icon: 'error',
                    confirmButtonColor: '#00C853',
                    confirmButtonText: 'Ok'
                });
                return;
            }
            else if (age > 25) {
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
        var countryCodeInput = $('#country_code').val().trim(); 
        var whatsappInput = $('#whatsapp_number').val().trim();
        var emailInput = $('#email').val().trim();
        var fullWhatsappNumber = countryCodeInput + whatsappInput;
        var category = '';
        if (recitalChecked) {
            category = 'recital';
        } else if (memorisationChecked) {
            category = 'memorisation';
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Please select a category.',
                icon: 'error',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'Ok'
            });
            return;
        }

        $.ajax({
            url: "/existing_user_detail",
            type: "POST",
            data: {
                category: category,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {

                var countryCodeMatch = response.filter(function(item) {
                    return item.country_code.trim() === countryCodeInput;
                });

                var whatsappCategoryMatch = countryCodeMatch.filter(function(item) {
                    return item.whatsapp_number.trim() === whatsappInput;
                });

                var emailCategoryMatch = response.filter(function(item) {
                    return item.email.trim() === emailInput;
                });

                if ((countryCodeMatch.length >0) && (whatsappCategoryMatch.length > 0)) {
                    var fullWhatsappNumber = whatsappCategoryMatch.map(item => item.category).join(', ');
                    Swal.fire({
                        title: 'Error',
                        text: `This whatsapp number has already been registered for ${fullWhatsappNumber}.`,
                        icon: 'error',
                        confirmButtonColor: '#00C853',
                        confirmButtonText: 'Ok'
                    });
                    return;
                }

                if (emailCategoryMatch.length > 0) {
                    var emailCategories = emailCategoryMatch.map(item => item.category).join(', ');
                    Swal.fire({
                        title: 'Error',
                        text: `This email has already been registered for ${emailCategories}.`,
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
            },
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
            profileCroppieInstance.result({ 
                type: "base64", 
                size: { width: 500, height: 500 } 
            }).then(function(dataImg) {
                profileCroppieInstance.result({ 
                    type: "base64", 
                    size: { width: 300, height: 300 } 
                }).then(function(previewImg) {
                    resultImage.html('<img src="' + previewImg + '" class="img-fluid" />'); 
                    showImage.hide();
                    showCroppedImage.show();
                });

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
            passportCroppieInstance.result({ 
                type: "base64", 
                size: { width: 500, height: 500 } 
            }).then(function(passportImg) {
                passportCroppieInstance.result({ 
                    type: "base64", 
                    size: { width: 300, height: 300 } 
                }).then(function(previewImg) {
                    passportResultImage.html('<img src="' + previewImg + '" class="img-fluid" />'); 
                    showPassportImage.hide();
                    showCroppedPassportImage.show();
                });

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
});
</script>

@endpush