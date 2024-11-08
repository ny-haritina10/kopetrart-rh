<html>
<style>
  body { font-family: Arial, sans-serif; padding: 20px; max-width: 1200px; margin: 0 auto; }
  .header { border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; }
  .comparison-container { display: flex; gap: 20px; }
  .column { flex: 1; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
  .skill-match {
    padding: 10px;
    margin: 5px 0;
    background: #f0f0f0;
    border-radius: 8px;
  }
  .match-score {
    font-size: 24px;
    text-align: center;
    padding: 20px;
    margin: 20px 0;
    background: #f5f5f5;
    border-radius: 8px;
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
</style>
<body>
  <div class="header">
    <h1>Comparaison CV avec profil talent</h1>
    <p>Candidat: {{ $dossier->candidat }} - Poste: {{ $profile->position }}</p>
  </div>

  <div class="match-score">
    Score de correspondance global: {{ $matchScore }}%
  </div>

  <div class="comparison-container">
    <div class="column">
      <h2>Profil requis</h2>
      <div class="skill-match">
        <h3>Compétences techniques</h3>
        <ul>
          @foreach($profile->technical_skills as $skill)
            <li>{{ $skill }} - Requis</li>
          @endforeach
        </ul>
      </div>
      <div class="skill-match">
        <h3>Expérience</h3>
        <ul>
          <li>{{ $profile->experience_years }} ans minimum</li>
          <li>{{ $profile->experience_description }}</li>
        </ul>
      </div>
    </div>

    <div class="column">
      <h2>Profil candidat</h2>
      <div class="skill-match">
        <h3>Compétences techniques</h3>
        <ul>
          @foreach($dossier->technical_skills as $skill)
            <li>{{ $skill }} - {{ $dossier->technical_skills_level[$loop->index] }} ans</li>
          @endforeach
        </ul>
      </div>
      <div class="skill-match">
        <h3>Expérience</h3>
        <ul>
          <li>{{ $dossier->experience_years }} ans total</li>
          <li>{{ $dossier->experience_description }}</li>
        </ul>
      </div>
    </div>
  </div>

  <div style="margin-top: 20px;">
    <button>Valider la correspondance</button>
    <button style="background: #666;">Rejeter</button>
    <button style="background: white; color: black; border: 1px solid black;">Retour</button>
  </div>
</body>
</html>