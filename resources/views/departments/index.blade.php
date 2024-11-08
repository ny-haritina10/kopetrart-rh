<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: 0 auto; }
        .header { border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        a, button {
            background: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .actions form, .actions a {
            display: inline-block;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Departments</h1>
    </div>
    <a href="{{ route('departments.create') }}">Add New Department</a>
    <ul>
        @foreach ($departments as $department)
            <li>
                <span>{{ $department->name }}</span>
                <div class="actions">
                    <a href="{{ route('departments.edit', $department->id) }}">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>