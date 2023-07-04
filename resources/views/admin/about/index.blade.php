@extends('backend')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-md-7">
        @if ($abouts->count() > 0)
        <div class="card">
            <h4 class="card-header text-center">About Update</h4>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $about->id }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $about->title }}">
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" rows="5" class="form-control">{!! $about->details !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-2">Update</button>
                </form>
            </div>
        </div>
        @else
        <div class="card">
            <h4 class="card-header text-center">Added About</h4>
            <div class="card-body">
                <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" rows="3" class="form-control"></textarea>
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