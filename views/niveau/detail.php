<div class="elema">
    <h3>Liste des classes rattacher au niveau</h3>
    <table border="1">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Filière</th>
                            <th>Niveau</th>
                            <th>Acte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= presence($classes) ?>
                        <?php foreach($classes as $classe) :?>
                            <tr>
                                <td><?= $classe['libelle'] ?></td>
                                <td><?= $classe['code'] ?></td>
                                <td><?= getLibelleByIdElement($filiere,$classe['idFiliere']) ?></td>
                                <td><?= getLibelleByIdElement($niveau,$classe['idNiveau']) ?></td>
                                <?php $id = $classe['id']?>
                                <td class="confclasse">
                                    <a href="<?=WEBROOT?>?page=modifClasse&id=<?=$id?>"><i class="fa-solid fa-pencil"></i></a>
                                    <a href=""><i class="fa-solid fa-eye"></i></a>
                                    <a href="<?=WEBROOT?>?page=classe&id=<?=$id?>" onclick="return confirm('La supression de cette classe entrainera la supression des etudiants auquel elle est liée.\nVoulez-vous confirmer ?')">
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