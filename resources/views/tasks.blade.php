<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tasks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .task-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .task-item:hover {
            background-color: #f8f9fa;
        }

        @media (max-width: 576px) {
            .task-actions {
                justify-content: center;
            }
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">📝 My Tasks</h3>

                <!-- Task list -->
                <ul class="list-group mb-4">
                    @forelse($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center task-item flex-column flex-sm-row text-center text-sm-start">
                            <span class="mb-2 mb-sm-0 flex-grow-1">{{ $task->name }}</span>

                            <div class="task-actions">
                                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-outline-secondary btn-sm">Edit</a>

                                <form method="POST" action="/tasks/{{ $task->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center">No tasks found.</li>
                    @endforelse
                </ul>

                <!-- Task form -->
                <form method="POST" action="/tasks" class="d-flex flex-column flex-sm-row gap-2">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Add a new task" required>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for dropdowns etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
