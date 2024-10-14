@extends('layouts.app')
<style>
    .custom-modal-width {
        max-width: 600px; /* Set your desired width here */
        width: 100%; /* Ensure it doesn't exceed the max width */
    }

    .modal-body {
        word-wrap: break-word; /* Break long words */
        white-space: pre-wrap; /* Preserve whitespace and wrap lines */
        overflow-wrap: break-word; /* Break words that are too long */
    }

    .modal-bodyy {
        max-height: 500px; /* Set your desired max height */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds max height */
    }
    /* Optional: Reduce the height of the textarea */
    #replyMessage {
        height: 200px; /* Set to your preferred height */
    }
</style>

@section('content')
<div class="container mt-5 ">
    <h1 class="text-center mb-4 mt-5" style="color:#E85C0D; padding-top:35px;">Emails List</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between mb-4 ">
        <!-- Search Field -->
        <form action="{{ route('contacts') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search by name or email..." value="{{ request()->query('search') }}">
            <button class="btn btn-outline-primary btn-lg ml-2" type="submit">Search</button>
        </form>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="text-light" style="background-color: #E85C0D;">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Sender's Name</th>
                <th scope="col">Sender's Email</th>
                <th scope="col">Sender's Message</th>
                <th scope="col">Admin Reply</th> 
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usemailers as $email)
                <tr>
                    <th scope="row">{{ $email->id }}</th>
                    <td>{{ $email->name }}</td>
                    <td>{{ $email->email }}</td>
                    <td>
                        {{ Str::limit($email->message, 50) }}
                        <button class="btn btn-link"  data-toggle="modal" data-target="#viewMessageModal-{{ $email->id }}">View</button>
                    </td>
                    <td>
                        @if ($email->is_replied)
                            {{ Str::limit($email->admin_reply, 50) }} 
                            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#replyModal-{{ $email->id }}">View</a>
                        @else
                            No reply yet
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $email->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this email?')">Delete</button>
                        </form>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#replyModal-{{ $email->id }}" {{ $email->is_replied ? 'disabled' : '' }}>Reply</button>
                    </td>
                </tr>

            <!-- Modal for Full Message -->
<div class="modal fade" id="viewMessageModal-{{ $email->id }}" tabindex="-1" role="dialog" aria-labelledby="viewMessageModalLabel-{{ $email->id }}" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document"> <!-- Use custom class here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewMessageModalLabel-{{ $email->id }}">Message from {{ $email->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Message:</strong></p>
                <p>{{ $email->message }}</p> <!-- This will wrap as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                <!-- Modal for Admin Reply -->
                <div class="modal fade" id="replyModal-{{ $email->id }}" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel-{{ $email->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel-{{ $email->id }}">Admin Reply to {{ $email->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('emails.reply', $email->id) }}" method="POST">
                @csrf
                <div class="modal-bodyy">
                    @if ($email->is_replied)
                        <p><strong>Previous Reply:</strong></p>
                        <p>{{ $email->admin_reply }}</p>
                    @else
                        <p>No reply has been made yet.</p>
                    @endif
                    <div class="form-group">
                        <label for="replyMessage">Your Reply:</label>
                        <textarea class="form-control" id="replyMessage" name="message" rows="3" required></textarea> <!-- Reduced rows for textarea -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>

            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
