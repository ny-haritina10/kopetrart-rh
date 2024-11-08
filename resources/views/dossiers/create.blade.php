<!DOCTYPE html>
<html>
<head>
    <title>Réception ou Modification du dossier de candidat</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: 0 auto; }
        .header { border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input, select, textarea {
            width: 100%;
            background: #f0f0f0;
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        button {
            background: black;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 10px;
        }
        .upload-zone {
            border: 2px dashed #ddd;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ isset($dossier) ? 'Modifier' : 'Réception' }} du dossier de candidat</h1>
    </div>
    
    <form method="POST" action="{{ isset($dossier) ? route('dossiers.update', $dossier->id) : route('dossiers.store') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($dossier))
            @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour -->
        @endif

        <div class="form-group">
            <label>Nom du candidat</label>
            <input type="text" name="candidat" placeholder="Entrez le nom" value="{{ old('candidat', $dossier->candidat ?? '') }}" required>
            
            <label>Email</label>
            <input type="email" name="email" placeholder="Entrez l'email" value="{{ old('email', $dossier->email ?? '') }}" required>
            
            <label>Poste concerné</label>
            <select name="poste" required>
                <option value="">Sélectionnez un poste</option>
                <option value="Développeur Full Stack" {{ (old('poste', $dossier->poste ?? '') == 'Développeur Full Stack') ? 'selected' : '' }}>Développeur Full Stack</option>
                <option value="Chef de projet" {{ (old('poste', $dossier->poste ?? '') == 'Chef de projet') ? 'selected' : '' }}>Chef de projet</option>
            </select>
            
            <div class="upload-zone">
                <p>Déposez le CV ici ou</p>
                <input type="file" name="cv" accept=".pdf,.doc,.docx">
                @if (isset($dossier->cv))
                    <p>CV actuel : <a href="{{ Storage::url($dossier->cv) }}" target="_blank">Voir le CV</a></p>
                @endif
            </div>
            
            <div class="upload-zone">
                <p>Déposez la lettre de motivation ici ou</p>
                <input type="file" name="lettre_motivation" accept=".pdf,.doc,.docx">
                @if (isset($dossier->lettre_motivation))
                    <p>Lettre actuelle : <a href="{{ Storage::url($dossier->lettre_motivation) }}" target="_blank">Voir la lettre de motivation</a></p>
                @endif
            </div>
        </div>

        <div class="actions">
            <button type="submit">{{ isset($dossier) ? 'Mettre à jour le dossier' : 'Enregistrer le dossier' }}</button>
            <button type="button" onclick="window.location.href='{{ route('dossiers.index') }}'" style="background: white; color: black; border: 1px solid black;">Annuler</button>
        </div>
    </form>
</body>
</html>
