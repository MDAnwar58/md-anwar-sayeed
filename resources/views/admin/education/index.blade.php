@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header text-center">Added Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="institutionName">Institution Name</label>
                            <input type="text" name="institutionName" id="institutionName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="field">Field</label>
                            <input type="text" name="field" id="field" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Duration</th>
                            <th>Institution Name</th>
                            <th>Field</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($educations as $education)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $education->duration }}</td>
                                <td>{{ $education->institutionName }}</td>
                                <td>{{ $education->field }}</td>
                                <td>{{ $education->details }}</td>
                                <td>
                                    <a href="{{ route('admin.education.edit', $education->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.education.destroy', $education->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
