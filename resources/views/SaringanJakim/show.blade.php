@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('example.index') }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $example->name }}" readonly>
                                </div>
    
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" readonly>{{ $example->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection