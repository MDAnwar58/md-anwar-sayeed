@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header text-center">Added Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="previewLink">Preveiw Link</label>
                            <input type="text" name="previewLink" id="previewLink" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="thumbnailLink">Thumbnail Link</label>
                            <input type="text" name="thumbnailLink" id="thumbnailLink" class="form-control">
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
                            <th>Title</th>
                            <th>Preview Link</th>
                            <th>Thembnail Link</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->previewLink }}</td>
                                <td>{{ $project->thumbnailLink }}</td>
                                <td>{{ $project->details }}</td>
                                <td>
                                    <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.project.destroy', $project->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination d-flex justify-content-end">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
