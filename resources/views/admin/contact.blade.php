@extends('layouts.app')

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
                <th scope="col">Checked</th> <!-- New Checked Column -->
                <th scope="col">ID</th>
                <th scope="col">Sender's Name</th>
                <th scope="col">Sender's Email</th>
                <th scope="col">Sender's Message</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usemailers as $email)
            <tr class="{{ $email->is_checked ? 'text-muted text-decoration-line-through' : '' }}"> <!-- Add conditional class -->
                <td>
                    <input type="checkbox" onchange="toggleChecked('{{ $email->id }}')" {{ $email->is_checked ? 'checked' : '' }}> <!-- Checkbox -->
                </td>
                <th scope="row">{{ $email->id }}</th>
                <td>{{ $email->name }}</td>
                <td>{{ $email->email }}</td>
                <td>{{ Str::limit($email->message, 50) }} <a href="#" data-toggle="modal" data-target="#messageModal-{{ $email->id }}">View</a></td>
                <td>
                    <form action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this email?')">Delete</button>
                    </form>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#replyModal-{{ $email->id }}">Reply</button>
                </td>
            </tr>

            <!-- Modal for Viewing Full Message -->
            <div class="modal fade" id="messageModal-{{ $email->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="messageModalLabel">Message from {{ $email->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $email->message }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Replying -->
            <div class="modal fade" id="replyModal-{{ $email->id }}" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="replyModalLabel">Reply to {{ $email->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('emails.reply', $email->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="replyMessage">Your Message</label>
                                    <textarea class="form-control" id="replyMessage" name="message" rows="5" required></textarea>
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

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleChecked(emailId) {
        const checkbox = document.querySelector(`input[type="checkbox"][onchange="toggleChecked(${emailId})"]`);
        const row = checkbox.closest('tr'); // Get the closest table row (tr)

        // Add line-through styling to all cells in the row
        row.querySelectorAll('td, th').forEach(cell => {
            cell.classList.add('text-decoration-line-through', 'text-muted');
        });

        // Disable the checkbox to prevent undoing
        checkbox.disabled = true;

        // Send an AJAX request to save the state in the database
        $.ajax({
            url: `/emails/check/${emailId}`, // Update this URL to your route
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                is_checked: true // Set the checked state to true
            },
            success: function(response) {
                console.log('Email marked as checked');
            },
            error: function(error) {
                console.error('Error marking email as checked:', error);
            }
        });
    }
</script>

@endsection
