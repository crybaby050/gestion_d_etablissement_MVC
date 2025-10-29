<div class="elemao">
    <h1 class="taj">MODIFICATION DE LA CLASSE</h1>
    <div class="ajoutc">
        <form action="" method="post">
            <div class="inpc">
                <div class="labc">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="" value="<?= $charge['libelle'] ?? "" ?>">
                    <p><?= $errors['nom'] ?? "" ?></p>
                </div>
                <div class="labc">
                    <label for="">Code</label>
                    <input type="text" name="cod" id="" value="<?= $charge['code'] ?? "" ?>">
                    <p><?= $errors['code'] ?? "" ?></p>
                </div>
                <div class="labc">
                    <label for="">Filière</label>
                    <select name="fil" id="">
                        <?php foreach($filiere as $k): ?>
                            <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="labc">
                    <label for="">Niveau</label>
                    <select name="niv" id="">
                        <?php foreach($niveau as $k): ?>
                            <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="modClasse" value="classe">Modifier</button>
        </form>
    </div>
</div>
</body>
</html>