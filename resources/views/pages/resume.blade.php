@extends('app')

@section('content')
<!-- ====================resume start==================== -->
<div class="resume_bg pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="pt-4 p-3 text-center">Resume</h2>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    @include('components.experience')
                    @include('components.education')
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card card-body skill_card p-sm-5 p-4">
                                    @include('components.profession-skills')
                                    @include('components.languages')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====================resume end==================== -->
@endsection
