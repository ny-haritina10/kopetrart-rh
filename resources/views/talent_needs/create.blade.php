<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Talent Need</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.5em;
            color: #333;
        }
        .form-container {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f0f0f0;
            color: #333;
        }
        .inline-inputs input[type="number"] {
            width: calc(50% - 10px);
            display: inline-block;
        }
        .inline-inputs {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 5px;
        }
        select {
            width: 100%;
            padding: 8px;
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
            width: 100%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Créer un Besoin de Talent</h1>
    </div>
    <div class="form-container">
        <form action="{{ route('talent_needs.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Titre:</label>
                <input type="text" name="title" id="title" required>
            </div>
            
            <div class="inline-inputs">
                <label>Année d'étude entre:</label>
                <input type="number" name="study_year_start" placeholder="Début" required>
                <span>et</span>
                <input type="number" name="study_year_end" placeholder="Fin" required>
            </div>

            <div class="inline-inputs">
                <label>Année d'expérience entre:</label>
                <input type="number" name="experience_year_start" placeholder="Début" required>
                <span>et</span>
                <input type="number" name="experience_year_end" placeholder="Fin" required>
            </div>

            <div>
                <label>Type de contrat:</label>
                <div class="inline-inputs">
                    <input type="radio" name="contract_type" value="CDD" required> CDD
                    <input type="radio" name="contract_type" value="CDI" required> CDI
                </div>
            </div>

            <div>
                <label>Genre:</label>
                <div class="inline-inputs">
                    <input type="checkbox" name="gender" value="Homme"> Homme
                    <input type="checkbox" name="gender" value="Femme"> Femme
                </div>
            </div>

            <div>
                <label for="minimum_age">Âge minimum requis:</label>
                <input type="number" name="minimum_age" id="minimum_age">
            </div>

            <div>
                <label for="expiration_date">Fin de validité:</label>
                <input type="date" name="expiration_date" id="expiration_date">
            </div>

            <div>
                <label for="priority">Priorité:</label>
                <select name="priority" id="priority">
                    <option value="Low">Basse</option>
                    <option value="Medium" selected>Moyenne</option>
                    <option value="High">Haute</option>
                </select>
            </div>

            <div>
                <label for="additional_info">Informations supplémentaires:</label>
                <textarea name="additional_info" id="additional_info"></textarea>
            </div>

            <div>
                <label for="department">Département:</label>
                <select name="department_id" id="department" required>
                    <option value="">Sélectionner le département</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="required_date">Date requise:</label>
                <input type="date" name="required_date" id="required_date">
            </div>

            <div>
                <label for="status">Statut:</label>
                <select name="status" id="status">
                    <option value="En cours">En cours</option>
                    <option value="Complété">Complété</option>
                    <option value="Annulé">Annulé</option>
                </select>
            </div>

            <button type="submit">Valider</button>
        </form>        
    </div>
</body>
</html>