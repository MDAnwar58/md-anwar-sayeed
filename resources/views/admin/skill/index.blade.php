@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header text-center">Added Skill</h4>
                <div class="card-body">
                    <form action="{{ route('admin.skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Skill Name</label>
                            <input type="text" name="name" id="name" class="form-control">
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
                            <th>Skill Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $skill->name }}</td>
                                <td>
                                    <a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('admin.skill.destroy', $skill->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination d-flex justify-content-end">
                {{ $skills->links() }}
            </div>
        </div>
    </div>
@endsection
