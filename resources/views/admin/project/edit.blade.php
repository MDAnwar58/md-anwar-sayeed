@extends('backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h4 class="card-header text-center">Update Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}">
                        </div>
                        <div class="form-group">
                            <label for="previewLink">Preview Link</label>
                            <input type="text" name="previewLink" id="previewLink" class="form-control" value="{{ $project->previewLink }}">
                        </div>
                        <div class="form-group">
                            <label for="thumbnailLink">Thumbnail Link</label>
                            <input type="text" name="thumbnailLink" id="thumbnailLink" class="form-control" value="{{ $project->thumbnailLink }}">
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control" rows="4">{!! $project->details !!}</textarea>
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
