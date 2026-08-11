@extends('layouts.app')

@section('title', 'Déposer mon projet - FONDATION HICE')

@section('content')
<div class="container">
    <div class="deposer-hero">
        <h1>🚀 Déposer <span>mon projet</span></h1>
        <p>
            Tu es élève ou étudiant ? Tu as une idée de projet entrepreneurial ?
            Remplis le formulaire ci-dessous et tente de faire partie des 3 lauréats de ta catégorie !
        </p>
    </div>

    <div class="categories-banner">
        <div class="category-item">
            <span class="category-icon">🏫</span>
            <h3>Collège</h3>
            <p>6ᵉ - 3ᵉ</p>
        </div>
        <div class="category-item">
            <span class="category-icon">📚</span>
            <h3>Lycée</h3>
            <p>2ᵈᵉ - Terminale</p>
        </div>
        <div class="category-item">
            <span class="category-icon">🎓</span>
            <h3>Université</h3>
            <p>L1 - L3</p>
        </div>
    </div>

    <div class="deposer-form-container">
        <div class="deposer-form-card">
            <h2>📝 Formulaire de candidature</h2>
            <p style="color: var(--gris-moyen); margin-bottom: 20px;">
                Tous les champs marqués d'un <span style="color: #dc3545;">*</span> sont obligatoires.
            </p>

            <form method="POST" action="{{ route('projets.store') }}">
                @csrf

                <div class="form-section">
                    <h3>👤 Informations personnelles</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nom complet <span style="color: #dc3545;">*</span></label>
                            <input type="text" name="nom_complet" required placeholder="Ex: Jean KOUADIO">
                        </div>
                        <div class="form-group">
                            <label>Email <span style="color: #dc3545;">*</span></label>
                            <input type="email" name="email" required placeholder="exemple@email.com">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Téléphone <span style="color: #dc3545;">*</span></label>
                            <input type="text" name="telephone" required placeholder="Ex: 01 40 10 61 13">
                        </div>
                        <div class="form-group">
                            <label>Ville <span style="color: #dc3545;">*</span></label>
                            <input type="text" name="ville" required placeholder="Ex: Abidjan">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>🏫 Informations scolaires</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Établissement <span style="color: #dc3545;">*</span></label>
                            <input type="text" name="etablissement" required placeholder="Nom de ton établissement">
                        </div>
                        <div class="form-group">
                            <label>Classe / Niveau <span style="color: #dc3545;">*</span></label>
                            <input type="text" name="classe_niveau" required placeholder="Ex: 3ᵉ, 2ᵈᵉ, L1...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Catégorie <span style="color: #dc3545;">*</span></label>
                        <select name="categorie" required>
                            <option value="">Sélectionne ta catégorie</option>
                            <option value="college">🏫 Collège (6ᵉ - 3ᵉ)</option>
                            <option value="lycee">📚 Lycée (2ᵈᵉ - Terminale)</option>
                            <option value="universite">🎓 Université (L1 - L3)</option>
                        </select>
                    </div>
                </div>

                <div class="form-section">
                    <h3>💡 Ton projet</h3>
                    <div class="form-group">
                        <label>Nom du projet <span style="color: #dc3545;">*</span></label>
                        <input type="text" name="nom_projet" required placeholder="Donne un nom à ton projet">
                    </div>

                    <div class="form-group">
                        <label>Décris ton projet <span style="color: #dc3545;">*</span></label>
                        <textarea name="description_projet" rows="5" required placeholder="Présente ton idée, ce que tu veux créer, quel problème tu veux résoudre..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Objectifs du projet <span style="color: #dc3545;">*</span></label>
                        <textarea name="objectifs" rows="4" required placeholder="Quels sont tes objectifs ? Que veux-tu accomplir ?"></textarea>
                    </div>

                    <div class="form-group">
                        <label>De quoi as-tu besoin ?</label>
                        <textarea name="besoins" rows="3" placeholder="Accompagnement, financement, formation, mentorat, matériel..."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn-submit">🚀 Envoyer ma candidature</button>
            </form>

            @if(session('success_projet'))
                <div class="flash-success" style="margin-top: 20px;">
                    ✅ {{ session('success_projet') }}
                </div>
            @endif
        </div>

        <div class="deposer-infos">
            <div class="info-card">
                <div class="info-icon">🏆</div>
                <h3>Pourquoi participer ?</h3>
                <ul>
                    <li>✨ Faire partie des 3 lauréats de ta catégorie</li>
                    <li>🚀 Bénéficier d'une incubation complète</li>
                    <li>📈 Accompagnement jusqu'aux premiers bénéfices</li>
                    <li>🤝 Intégrer un réseau d'entrepreneurs</li>
                </ul>
            </div>

            <div class="info-card">
                <div class="info-icon">📋</div>
                <h3>Calendrier</h3>
                <ul>
                    <li>📅 Candidatures : Ouvertes</li>
                    <li>⏳ Date limite : À venir</li>
                    <li>📢 Annonce des lauréats : À venir</li>
                </ul>
            </div>

            <div class="info-card">
                <div class="info-icon">📞</div>
                <h3>Une question ?</h3>
                <p><strong>Email :</strong> diahoujoel750@gmail.com</p>
                <p><strong>Téléphone :</strong> 01 40 10 61 13</p>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --noir: #0A0A0A;
        --noir-secondaire: #1A1A1A;
        --or: #D4AF37;
        --or-clair: #F0D060;
        --orange: #E67E22;
        --orange-vif: #FF6B00;
        --blanc: #FFFFFF;
        --gris-clair: #CCCCCC;
        --gris-moyen: #888888;
    }

    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

    .deposer-hero {
        text-align: center;
        padding: 40px 0 20px;
    }
    .deposer-hero h1 {
        font-size: 40px;
        font-weight: 800;
        color: var(--blanc);
    }
    .deposer-hero h1 span {
        color: var(--or);
    }
    .deposer-hero p {
        font-size: 17px;
        color: var(--gris-clair);
        max-width: 550px;
        margin: 10px auto 0;
        line-height: 1.7;
    }

    .categories-banner {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin: 30px 0 40px;
    }
    .category-item {
        background: var(--noir-secondaire);
        padding: 25px;
        border-radius: 16px;
        text-align: center;
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .category-item:hover {
        border-color: var(--or);
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .category-item .category-icon {
        font-size: 40px;
        display: block;
        margin-bottom: 10px;
    }
    .category-item h3 {
        font-size: 18px;
        color: var(--or);
    }
    .category-item p {
        color: var(--gris-moyen);
        font-size: 14px;
    }

    .deposer-form-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
        margin: 30px 0 60px;
    }

    .deposer-form-card {
        background: var(--noir-secondaire);
        padding: 35px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .deposer-form-card h2 {
        font-size: 24px;
        color: var(--or);
        margin-bottom: 20px;
    }

    .form-section {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .form-section h3 {
        font-size: 17px;
        color: var(--or);
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--or);
        margin-bottom: 5px;
        font-size: 14px;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.1);
        font-size: 15px;
        transition: 0.3s;
        background: var(--noir);
        color: var(--blanc);
    }
    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--gris-moyen);
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: var(--or);
        outline: none;
        background: var(--noir);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .btn-submit {
        background: var(--or);
        color: var(--noir);
        padding: 16px 40px;
        border: none;
        border-radius: 50px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
        width: 100%;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        margin-top: 10px;
    }
    .btn-submit:hover {
        background: var(--or-clair);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    .flash-success {
        background: #1a3a1a;
        border-left: 5px solid #28a745;
        color: #28a745;
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 500;
    }

    .deposer-infos {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .info-card {
        background: var(--noir-secondaire);
        padding: 25px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .info-card .info-icon {
        font-size: 32px;
        display: block;
        margin-bottom: 10px;
    }
    .info-card h3 {
        font-size: 17px;
        color: var(--or);
        margin-bottom: 10px;
    }
    .info-card ul {
        list-style: none;
        padding: 0;
    }
    .info-card ul li {
        color: var(--gris-clair);
        padding: 6px 0;
        font-size: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .info-card ul li:last-child {
        border-bottom: none;
    }
    .info-card p {
        color: var(--gris-clair);
        font-size: 14px;
        line-height: 1.8;
        margin: 5px 0;
    }
    .info-card p strong {
        color: var(--blanc);
    }

    @media (max-width: 992px) {
        .deposer-form-container {
            grid-template-columns: 1fr;
        }
        .categories-banner {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (max-width: 768px) {
        .deposer-hero h1 { font-size: 30px; }
        .deposer-form-card { padding: 25px; }
        .form-row { grid-template-columns: 1fr; }
        .categories-banner {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
