<div class="elema">
    <div class="filpage">
        <h3>Ajouter une nouvelle fillière</h3>
        <form action="" method="post">
            <div class="filinp">
                <div class="filab">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" id="" placeholder="Niveau" value=<?= $lib ?? "" ?>>
                    <p><?= $errors['lib'] ?? "" ?></p>
                </div>
                <!-- <div class="filab2">
                    <label for="">Description :</label>
                    <input type="text" name="desc" id="" placeholder="Description">
                </div> -->
            </div>
            <button type="submit" class="class-bouton" name="ajniv" value="">Enregistrer</button>
        </form>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Classe rattacher avec niveau</th>
            </tr>
        </thead>
        <tbody>
            <?= presence($niveau) ?>
            <?php foreach ($niveau as $niv) : ?>
                <tr>
                    <?php $id=$niv['id']?>
                    <td><?= $niv['libelle'] ?></td>
                    <td>
                        <a href="<?=WEBROOT?>?page=classeniveau&id=<?=$niv['id']?>">
                            <button>Voir liste</button>
                        </a>
                        <a href="<?= WEBROOT ?>?page=liste_niveau&id=<?= $id ?>" onclick="return confirm('La supression de cette filiere entrainera la supression des classes et etudiants auquel elle est liée.\nVoulez-vous confirmer ?')">
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