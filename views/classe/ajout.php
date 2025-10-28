<div class="elemao">
    <h1 class="taj">Ajouter une nouvelle classe</h1>
    <div class="ajoutc">
        <form action="" method="post">
            <div class="inpc">
                <div class="labc">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="" value="<?= $lib ?? "" ?>" placeholder=" nom de classe">
                    <p><?= $errors['nom'] ?? "" ?></p>
                </div>
                <div class="labc">
                    <label for="">Code</label>
                    <input type="text" name="cod" id="" value="<?= $code ?? "" ?>" placeholder=" code de classe">
                    <p><?= $errors['code'] ?? "" ?></p>
                </div>
                <div class="labc">
                    <label for="">Filière</label>
                    <select name="fil" id="" value="<?= $clas ?>">
                        <?php foreach($filiere as $k): ?>
                            <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="labc">
                    <label for="">Niveau</label>
                    <select name="niv" id="" value="<?= $clas ?>">
                        <?php foreach($niveau as $k): ?>
                            <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="ajClasses" value="ajClasse">Add</button>
        </form>
    </div>
</div>
</body>
</html>