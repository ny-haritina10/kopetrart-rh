<!-- resources/views/dossiers/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Liste des dossiers</title>
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
    .status-tag {
      padding: 4px 8px;
      border-radius: 4px;
      background: #f0f0f0;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Liste des dossiers de candidat</h1>
  </div>

  <div class="search-bar">
    <form method="GET" action="{{ route('dossiers.index') }}">
      <input type="text" name="search" placeholder="Rechercher un candidat...">
      <select name="poste">
        <option value="">Tous les postes</option>
        <option value="Développeur">Développeur</option>
        <option value="Designer">Designer</option>
      </select>
      <select name="statut">
        <option value="">Tous les statuts</option>
        <option value="Nouveau">Nouveau</option>
        <option value="En cours">En cours</option>
        <option value="Validé">Validé</option>
      </select>
      <button type="submit">Rechercher</button>
    </form>
  </div>

  <table>
    <thead>
      <tr>
        <th>Candidat</th>
        <th>Poste</th>
        <th>Date réception</th>
        <th>Statut</th>
        <th>Documents</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dossiers as $dossier)
        <tr>
          <td>{{ $dossier->candidat }}</td>
          <td>{{ $dossier->poste }}</td>
          <td>{{ $dossier->date_reception }}</td>
          <td><span class="status-tag">{{ $dossier->statut }}</span></td>
          <td>
            <button>CV</button>
            <button>LM</button>
          </td>
          <!-- resources/views/dossiers/index.blade.php -->
            <td>
                <!-- Modifier -->
                <a href="{{ route('dossiers.edit', $dossier->id) }}">
                    <button>Modifier</button>
                </a>

                <!-- Supprimer -->
                <form action="{{ route('dossiers.destroy', $dossier->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce dossier ?')">Supprimer</button>
                </form>
            </td>

        </tr>
      @endforeach
    </tbody>
  </table>
  @if(session('success'))
    <div style="color: green; font-weight: bold; margin-top: 20px;">
        {{ session('success') }}
    </div>
@endif

</body>
</html>
