@extends('backend')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            @if ($socials->count() > 0)
                <div class="card">
                    <h4 class="card-header text-center">Social Update</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.social.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="id" value="{{ $social->id }}">
                            <div class="form-group">
                                <label for="twitterLink">Twitter Link</label>
                                <input type="text" name="twitterLink" id="twitterLink" class="form-control"
                                    value="{{ $social->twitterLink }}">
                            </div>
                            <div class="form-group">
                                <label for="githubLink">Github Link</label>
                                <input type="text" name="githubLink" id="githubLink" class="form-control" value="{{ $social->githubLink }}">
                            </div>
                            <div class="form-group">
                                <label for="linkedinLink">Linkedin Link</label>
                                <input type="text" name="linkedinLink" id="linkedinLink" class="form-control"
                                    value="{{ $social->linkedinLink }}">
                            </div>
                            <button type="submit" class="btn btn-dark w-100 mt-2">Update</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <h4 class="card-header text-center">Added Social</h4>
                    <div class="card-body">
                        <form action="{{ route('admin.social.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="twitterLink">Twitter Link</label>
                                <input type="text" name="twitterLink" id="twitterLink" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="githubLink">Github Link</label>
                                <input type="text" name="githubLink" id="githubLink" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="linkedinLink">Linkedin Link</label>
                                <input type="text" name="linkedinLink" id="linkedinLink" class="form-control">
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
