<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Talent Need</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 1200px; margin: 0 auto; }
        .form-container { border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: #f9f9f9; }
        label { display: block; margin-bottom: 8px; }
        input, select, textarea { 
            width: 100%; 
            padding: 8px; 
            margin-bottom: 20px; 
            border-radius: 8px; 
            border: 1px solid #ddd; 
            background: #f0f0f0; 
        }
        button {
            background: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Edit Talent Need</h1>
    <div class="form-container">
        <form action="{{ route('talent_needs.update', $talentNeed->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Titre:</label>
                <input type="text" name="title" id="title" value="{{ $talentNeed->title }}" required>
            </div>
            <!-- Additional form fields -->
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>