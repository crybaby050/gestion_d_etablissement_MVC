        <div class="elems">
            <a href="<?=WEBROOT?>?page=liste_etudiant"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <div class="detailTitre">
                <h3>Details</h3>
            </div>
            <div class="detEtud">
                <div class="detinfo">
                    <div class="etuInf">
                        <img src="/../image/schoologo.jpg" alt="" srcset="">
                    </div>
                    <div class="detOther">
                        <h2>Information de l'etudiant</h2>
                        <div class="infdet">
                            <div>Matricule :<?= $detail['matricule'] ?></div>
                            <div>Nom :<?= $detail['nom'] ?></div>
                            <div>Prenom :<?= $detail['prenom'] ?></div>
                            <div>Classe :<?= getLibelleByIdElement($classe,$detail['idClasse']) ?></div>
                            <div>Filière :<?= getlibelleFilliereByClasse($classe,$detail['idClasse']) ?></div>
                            <div>Niveau :<?= getlibelleNiveauByClasse($classe,$detail['idClasse']) ?></div>
                            <div>Mail :<?= $detail['email'] ?></div>
                            <div>Telephone :<?= $detail['telephone'] ?></div>
                            <div>Adresse :<?= $detail['adresse'] ?></div>    
                        </div>
                        <div class="detBouton">
                            <button><a href="<?=WEBROOT?>?page=modif_etudiant&id=<?=$id?>">Modifier</a></button>
                            <button><a href="<?=WEBROOT?>?page=liste_etudiant" onclick="return confirm('Cette fonctionalité est pas encore disponible ?')">Supprimer</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>