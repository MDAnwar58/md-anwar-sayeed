@extends('backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header text-center">User Contact Information</h4>
                <div class="card-body">
                    <h3>Name: {{ $contact->fullName }}</h2>
                        <p>Email: {{ $contact->email }}</p>
                        <p>Phone: {{ $contact->phone }}</p>
                        <p>Message: {{ $contact->message }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#img').dropify({
            // 'remove':  'Remove',
        });
    </script>
@endsection
