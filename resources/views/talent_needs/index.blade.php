<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des besoins en talent</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 1200px; margin: 0 auto; }
        .header { border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        .search-bar { margin-bottom: 20px; }
        input, select { 
            background: #f0f0f0; 
            border: 1px solid #ddd; 
            padding: 8px 12px; 
            border-radius: 8px; 
            margin-right: 10px;
        }
        button {
            background: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th { background: #f5f5f5; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Liste des besoins en talent</h1>
    </div>
  
    <div class="search-bar">
        <input type="text" placeholder="Rechercher...">
        <select>
            <option>Département</option>
            <option>IT</option>
            <option>RH</option>
            <option>Finance</option>
        </select>
        <button>Rechercher</button>
        <a href="{{ route('talent_needs.create') }}" style="float: right; text-decoration: none;">
            <button>+ Nouveau besoin</button>
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Poste</th>
                <th>Département</th>
                <th>Urgence</th>
                <th>Date requise</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($talentNeeds as $talentNeed)
                <tr>
                    <td>{{ $talentNeed->title }}</td>
                    <td>{{ $talentNeed->department }}</td>
                    <td>{{ $talentNeed->priority }}</td>
                    <td>{{ $talentNeed->required_date }}</td>
                    <td>{{ $talentNeed->status }}</td>
                    <td>
                        <a href="{{ route('talent_needs.edit', $talentNeed->id) }}">
                            <button>Modifier</button>
                        </a>
                        <form action="{{ route('talent_needs.destroy', $talentNeed->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

