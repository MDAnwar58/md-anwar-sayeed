@extends('backend')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-5">
        @if ($heros->count() > 0)
        <div class="card">
            <h4 class="card-header text-center">Added Update</h4>
            <div class="card-body">
                <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $hero->id }}">
                    <div class="form-group">
                        <label for="keyLine">Key Line</label>
                        <input type="text" name="keyLine" id="keyLine" class="form-control" value="{{ $hero->keyLine }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $hero->title }}">
                    </div>
                    <div class="form-group">
                        <label for="short_title">Short Title</label>
                        <input type="text" name="short_title" id="short_title" class="form-control" value="{{ $hero->short_title }}">
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" id="img" class="form-control" data-default-file="{{ url('upload/images/hero', $hero->img) }}">
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-2">Update</button>
                </form>
            </div>
        </div>
        @else
        <div class="card">
            <h4 class="card-header text-center">Added Hero</h4>
            <div class="card-body">
                <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="keyLine">Key Line</label>
                        <input type="text" name="keyLine" id="keyLine" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="short_title">Short Title</label>
                        <input type="text" name="short_title" id="short_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-2">Save</button>
                </form>
            </div>
        </div>
        @endif
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