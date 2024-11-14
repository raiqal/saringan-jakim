@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Congratulations!</h5>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            Congratulations! You have successfully registered for the perticipation.
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
