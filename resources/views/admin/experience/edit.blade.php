@extends('backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h4 class="card-header text-center">Update Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control" value="{{ $experience->duration }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $experience->title }}">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $experience->designation }}">
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control" rows="4">{!! $experience->details !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 mt-2">Update</button>
                    </form>
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
