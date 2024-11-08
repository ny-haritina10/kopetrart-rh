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
            max-width: 1200px; 
            margin: 0 auto; 
            background-color: #eaeaea; 
        }
        .form-container { 
            border: 1px solid #ddd; 
            padding: 30px; 
            border-radius: 10px; 
            background: #ffffff; 
            max-width: 800px; 
            margin: 0 auto; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 { 
            text-align: center; 
            margin-bottom: 30px; 
            color: #333;
        }
        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: bold; 
            color: #555;
        }
        input, select, textarea { 
            width: calc(100% - 22px); /* Adjust for padding */
            max-width: 400px; 
            padding: 12px; 
            margin-bottom: 20px; 
            border-radius: 5px; 
            border: 1px solid #ccc; 
            background: #f9f9f9; 
            transition: border-color 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
        }
        .inline-inputs {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .inline-inputs input { 
            width: 80px; /* Adjusted for better layout */
        }
        button {
            display: block;
            width: auto;
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Créer un Besoin de Talent</h1>
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

           <!-- New Fields -->
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
               <label for "status">Statut:</label>
               <select name "status", id "status">
                   <!-- Options -->
                   option value "En cours">En cours</option
                   option value "Complété">Complété</option
                   option value "Annulé">Annulé</option
               </select
           </div>

           <!-- End of New Fields -->

           <!-- Submit Button -->
           <button type "submit">Valider</button>

       </form>        
   </div>

</body>

</html>