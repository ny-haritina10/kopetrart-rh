<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 0 auto; }
        .header { border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        label { display: block; margin-top: 10px; }
        input {
            width: 100%;
            padding: 8px 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f0f0f0;
        }
        button {
            background: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit Department</h1>
    </div>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Department Name:</label>
        <input type="text" name="name" id="name" value="{{ $department->name }}" required>
        <button type="submit">Update Department</button>
    </form>
</body>
</html>