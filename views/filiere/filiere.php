<div class="elema">
    <div class="filpage">
        <h3>Ajouter une nouvelle fillière</h3>
        <form action="" method="post">
            <div class="filinp">
                <div class="filab">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" id="" placeholder="Fillière" value=<?= $lib ?? "" ?>>
                    <p><?= $errors['lib'] ?? "" ?></p>
                </div>
            </div>
            <button type="submit" class="class-bouton" name="ajfil" value="">Enregistrer</button>
        </form>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Classe rattaché avec filiere</th>
            </tr>
        </thead>
        <tbody>
            <?= presence($filiere) ?>
            <?php foreach ($filiere as $filier) : ?>
                <tr>
                    <td><?= $filier['libelle'] ?></td>
                    <?php $id=$filier['id']?>
                    <td>
                        <a href="<?= WEBROOT ?>?page=detail_filiere&id=<?= $filier['id'] ?>">
                            <button>Voir liste</button>
                        </a>
                        <a href="<?= WEBROOT ?>?page=liste_filiere&id=<?= $id ?>" onclick="return confirm('La supression de cette filiere entrainera la supression des classes et etudiants auquel elle est liée.\nVoulez-vous confirmer ?')">
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