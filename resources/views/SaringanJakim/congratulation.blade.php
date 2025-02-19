@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <h5>Congratulations!</h5>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <p>Congratulations! You have successfully registered for the <strong>64TH INTERNATIONAL ASSEMBLY MALAYSIA SCREENING SESSION</strong> event!</p>
                            <p>This is a wonderful achievement, and we commend your dedication and effort in securing your spot.</p>
                            <p>We are excited to have you join us for this prestigious event, where you will have the opportunity to connect with like-minded individuals, celebrate the beauty of the Quran, and experience a meaningful gathering of recitation and memorization.</p>
                            <p>Your participation is a significant step toward enriching your knowledge and sharing in this esteemed experience.</p>
                            <p>Congratulations once again, and we look forward to seeing you at the assembly!</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('saringan.create') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 success pop-up -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                // title: 'Data Updated!',
                text: 'You have successfully registered!',
                icon: 'success',
                confirmButtonColor: '#00C853',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endsection
