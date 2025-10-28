<div class="menu">
    <div class="liste">
        <div class="logo">
            <div class="rond"></div>
            <h2>E 221</h2>
        </div>
        <div class="lis">
            <ul>
                <!-- Tableau de bord -->
                <li><i class="fas fa-home"></i><a href="?page=dashboard">ACCUEIL</a></li>
                <!-- Étudiants -->
                <li><i class="fa-solid fa-user-group"></i><a href="?page=liste_etudiant">ÉTUDIANTS</a></li>
                <li><i class="fa-solid fa-user-group"></i><a href="?page=ajout_etudiant">AJOUT ÉTUDIANT</a></li>
                <!-- Classes -->
                <li><i class="fa-solid fas fa-school"></i><a href="?page=liste_classe">CLASSE</a></li>
                <li><i class="fa-solid fas fa-school"></i><a href="?page=ajout_classe">AJOUT CLASSE</a></li>
                <!-- Filière -->
                <li><i class="fa-solid fas fa-book-open"></i><a href="?page=liste_filiere">FILIÈRE</a></li>
                <!-- Niveaux -->
                <li><i class="fa-solid fa-chart-line"></i><a href="?page=liste_niveau">NIVEAU</a></li>
            </ul>
        </div>
    </div>
    <div class="dec">
        <ul>
            <li><i class="fa-solid fa-gear"></i>PARAMÈTRES</li>
            <li><i class="fa-solid fa-right-to-bracket"></i><a href="?page=logout">DÉCONNEXION</a></li>
        </ul>
    </div>
</div>

<div class="search">
    <div class="s">
        <input type="text" placeholder="Search" class="ser">
    </div>
    <div class="r">
        <p>Bienvenue <strong><?= $nameUser['nom'] ?></strong></p>
        <i class="fa-solid fa-moon"></i>
        <i class="fa-solid fa-bell"></i>
        <div class="rond2"></div>
    </div>
</div>
