@extends('layouts.app')

@section('title', 'À propos - FONDATION HICE')

@section('content')
<div class="container">
    <div class="about-hero">
        <h1>À propos de la <span>FONDATION HICE</span></h1>
        <p>
            Découvrez notre mission, notre vision et l'équipe qui œuvre chaque jour
            pour l'entrepreneuriat en milieu scolaire et universitaire.
        </p>
    </div>

    <div class="about-section">
        <div class="about-card">
            <div class="about-icon">🎯</div>
            <h2>Notre Mission</h2>
            <p>
                Promouvoir l'entrepreneuriat en milieu scolaire et universitaire en accompagnant
                les élèves de la 6ᵉ jusqu'aux étudiants en Licence 3 dans la concrétisation
                de leurs projets.
            </p>
        </div>

        <div class="about-card">
            <div class="about-icon">🌟</div>
            <h2>Notre Vision</h2>
            <p>
                Créer un écosystème entrepreneurial durable dans les établissements scolaires
                et universitaires de tout le territoire, en formant la prochaine génération
                de créateurs d'entreprises.
            </p>
        </div>

        <div class="about-card">
            <div class="about-icon">💡</div>
            <h2>Nos Valeurs</h2>
            <ul>
                <li><strong>Innovation</strong> — Encourager la créativité et l'audace</li>
                <li><strong>Solidarité</strong> — Accompagner chaque jeune vers la réussite</li>
                <li><strong>Excellence</strong> — Valoriser le mérite et la performance</li>
                <li><strong>Intégrité</strong> — Agir avec transparence et éthique</li>
            </ul>
        </div>
    </div>

    <div class="about-programme">
        <h2>🏆 Notre Programme</h2>
        <div class="programme-grid">
            <div class="programme-step">
                <span class="step-number">1</span>
                <h3>Compétitions de pitchs</h3>
                <p>3 catégories : Collège (6ᵉ-3ᵉ), Lycée (2ᵈᵉ-Tle), Université (L1-L3)</p>
            </div>
            <div class="programme-step">
                <span class="step-number">2</span>
                <h3>Formations</h3>
                <p>Entrepreneuriat, gestion de projet, techniques de pitch</p>
            </div>
            <div class="programme-step">
                <span class="step-number">3</span>
                <h3>Sélection</h3>
                <p>3 lauréats par catégorie sont choisis chaque année</p>
            </div>
            <div class="programme-step">
                <span class="step-number">4</span>
                <h3>Incubation</h3>
                <p>Accompagnement complet jusqu'aux premiers bénéfices</p>
            </div>
        </div>
    </div>

    <div class="about-team">
        <h2>👥 L'Équipe</h2>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-photo">👩‍💼</div>
                <h3>KOFFI HILARY &  OYA ERIC</h3>
                <p>Directrice de la Fondation</p>
                <span class="team-badge">Fondatrice</span>
            </div>
            <div class="team-card">
                <div class="team-photo">👨‍💼</div>
                <h3>KOFFI HILARY</h3>
                <p>Coordinateur Général</p>
                <span class="team-badge">Co-fondateur</span>
            </div>
            <div class="team-card">
                <div class="team-photo">👩‍🏫</div>
                <h3>KOFFI HILARY</h3>
                <p>Responsable des Programmes</p>
                <span class="team-badge">Équipe</span>
            </div>
        </div>
    </div>

    <div class="about-cta">
        <h2>Rejoignez l'aventure !</h2>
        <p>
            Vous souhaitez contribuer à notre mission ou déposer votre projet ?
            N'hésitez pas à nous contacter.
        </p>
        <p style="color: var(--gris-moyen); margin-bottom: 20px;">
            📞 01 40 10 61 13 | ✉️ diahoujoel750@gmail.com
        </p>
        <a href="/contact" class="btn btn-or">Nous contacter</a>
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

    .about-hero {
        text-align: center;
        padding: 50px 0 30px;
    }
    .about-hero h1 {
        font-size: 42px;
        font-weight: 800;
        color: var(--blanc);
    }
    .about-hero h1 span {
        color: var(--or);
    }
    .about-hero p {
        font-size: 18px;
        color: var(--gris-clair);
        max-width: 600px;
        margin: 15px auto 0;
        line-height: 1.7;
    }

    .about-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 50px 0;
    }
    .about-card {
        background: var(--noir-secondaire);
        padding: 30px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        transition: 0.3s;
    }
    .about-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .about-card .about-icon {
        font-size: 40px;
        display: block;
        margin-bottom: 15px;
    }
    .about-card h2 {
        font-size: 22px;
        color: var(--or);
        margin-bottom: 12px;
    }
    .about-card p {
        color: var(--gris-clair);
        line-height: 1.7;
        font-size: 15px;
    }
    .about-card ul {
        list-style: none;
        padding: 0;
    }
    .about-card ul li {
        color: var(--gris-clair);
        padding: 6px 0;
        font-size: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .about-card ul li:last-child {
        border-bottom: none;
    }
    .about-card ul li strong {
        color: var(--blanc);
    }

    .about-programme {
        background: var(--noir-secondaire);
        padding: 40px;
        border-radius: 16px;
        margin: 40px 0;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .about-programme h2 {
        font-size: 28px;
        color: var(--or);
        text-align: center;
        margin-bottom: 30px;
    }
    .programme-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    .programme-step {
        text-align: center;
        background: var(--noir);
        padding: 25px 20px;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
    }
    .programme-step:hover {
        border-color: var(--or);
        transform: translateY(-3px);
    }
    .programme-step .step-number {
        display: inline-block;
        background: var(--or);
        color: var(--noir);
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 50%;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 12px;
    }
    .programme-step h3 {
        font-size: 16px;
        color: var(--blanc);
        margin-bottom: 8px;
    }
    .programme-step p {
        font-size: 14px;
        color: var(--gris-clair);
        line-height: 1.5;
    }

    .about-team {
        margin: 50px 0;
    }
    .about-team h2 {
        font-size: 28px;
        color: var(--or);
        text-align: center;
        margin-bottom: 30px;
    }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .team-card {
        background: var(--noir-secondaire);
        padding: 30px;
        border-radius: 16px;
        text-align: center;
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .team-card:hover {
        transform: translateY(-5px);
        border-color: var(--or);
        box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }
    .team-card .team-photo {
        font-size: 56px;
        display: block;
        margin-bottom: 12px;
    }
    .team-card h3 {
        font-size: 18px;
        color: var(--or);
        margin-bottom: 5px;
    }
    .team-card p {
        color: var(--gris-clair);
        font-size: 14px;
    }
    .team-card .team-badge {
        display: inline-block;
        background: rgba(212, 175, 55, 0.15);
        color: var(--or);
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .about-cta {
        text-align: center;
        background: var(--noir-secondaire);
        padding: 50px;
        border-radius: 16px;
        border: 2px solid var(--or);
        margin: 50px 0;
        box-shadow: 0 4px 30px rgba(0,0,0,0.3);
    }
    .about-cta h2 {
        font-size: 28px;
        color: var(--or);
        margin-bottom: 12px;
    }
    .about-cta p {
        color: var(--gris-clair);
        font-size: 17px;
        max-width: 500px;
        margin: 0 auto 25px;
        line-height: 1.7;
    }

    .btn {
        padding: 14px 32px;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }
    .btn-or {
        background: var(--or);
        color: var(--noir);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
    }
    .btn-or:hover {
        background: var(--or-clair);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    @media (max-width: 992px) {
        .about-section { grid-template-columns: 1fr 1fr; }
        .programme-grid { grid-template-columns: 1fr 1fr; }
        .team-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .about-section { grid-template-columns: 1fr; }
        .programme-grid { grid-template-columns: 1fr; }
        .team-grid { grid-template-columns: 1fr; }
        .about-hero h1 { font-size: 30px; }
        .about-programme { padding: 25px; }
        .about-cta { padding: 30px 20px; }
    }
</style>
@endsection
