<div class="elema">
    <h3>Information de la classe</h3>
    <div class="infClasse">
        <div class="imgClasse"></div>
        <div class="detailClasse">
            <div>Libelle :<?= $detail['libelle'] ?></div>
            <div>Code :<?= $detail['code'] ?></div>
            <div>Filière :<?= getLibelleByIdElement($filiere,$detail['idFiliere'])  ?></div>
            <div>Niveau :<?= getLibelleByIdElement($niveau,$detail['idNiveau']) ?></div>
            <div>Nombre d'etudiants associer :<?= count($etudes) ?></div>
        </div>
    </div>
    <h3>Etudiant Associer</h3>
    <table border="1">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Classe</th>
                            <th>Telephone</th>
                            <th>Mail</th>
                            <th>Adresse</th>
                            <th>Acte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= presence($etudes) ?>
                        <?php foreach($etudes as $k) :?>
                            <tr>
                                <td><?= $k['matricule'] ?></td>
                                <td><?= $k['nom'] ?></td>
                                <td><?= $k['prenom'] ?></td>
                                <td><?= getLibelleByIdElement($classe,$k['idClasse']) ?></td>
                                <td><?= $k['telephone'] ?></td>
                                <td><?= $k['email'] ?></td>
                                <td><?= $k['adresse'] ?></td>
                                <?php $id = $k['id']?>
                                <td class="confclasse">
                                    <a href="<?=WEBROOT?>?page=modif_etudiant&id=<?=$id?>"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="<?=WEBROOT?>?page=detail_etudiant&id=<?=$id?>"><i class="fa-solid fa-eye"></i></a>
                                    <a href="<?=WEBROOT?>?page=liste_etudiant&id=<?=$id?>" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
</div>
</body>

</html>