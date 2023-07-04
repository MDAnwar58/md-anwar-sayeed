@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header text-center">Added Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.experience.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control">
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
                            <th>Title</th>
                            <th>Designation</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experiences as $experience)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $experience->duration }}</td>
                                <td>{{ $experience->title }}</td>
                                <td>{{ $experience->designation }}</td>
                                <td>{{ $experience->details }}</td>
                                <td>
                                    <a href="{{ route('admin.experience.edit', $experience->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.experience.destroy', $experience->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
