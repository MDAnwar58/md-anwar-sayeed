@extends('backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Read/Unread</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $contact->fullName }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>
                                    @if ($contact->is_read == 0)
                                        <span class="badge bg-warning">unread</span>
                                    @else
                                        <span class="badge bg-success">read</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.contact.view', $contact->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('admin.contact.destroy', $contact->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination d-flex justify-content-end">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
