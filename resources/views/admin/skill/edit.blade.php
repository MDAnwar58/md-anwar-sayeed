@extends('backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h4 class="card-header text-center">Update Experience</h4>
                <div class="card-body">
                    <form action="{{ route('admin.skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Skill Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $skill->name }}">
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
