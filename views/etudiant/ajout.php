
<div class="elemao">
    <h1 class="taj">Ajouter un etudiant</h1>
    <div class="ajout">
        <form action="" method="post">
            <div class="inp">
                <div class="lab">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="" value="<?= $lib ?? "" ?>">
                    <p><?= $errors['nom'] ?? "" ?></p>
                </div>
                <div class="lab">
                    <label for="">Prenom</label>
                    <input type="text" name="pre" id="" value="<?= $pre ?? "" ?>">
                    <p><?= $errors['pre'] ?? "" ?></p>
                </div>
                <div class="lab">
                    <label for="">Mail</label>
                    <input type="email" name="mai" id="" value="<?= $mail ?? "" ?>">
                    <p><?= $errors['mai'] ?? "" ?></p>
                </div>
                <div class="lab">
                    <label for="">Tel</label>
                    <input type="tel" name="tel" id="" value="<?= $tel ?? "" ?>">
                    <p><?= $errors['tel'] ?? "" ?></p>
                </div>
                <div class="lab">
                    <!-- <label for="">Classe</label>
                    <input type="text" name="fil" id=""> -->
                    <label for="">Classe</label>
                    <select name="cla" id="" value="<?= $clas ?>">
                        <?php foreach($classe as $k): ?>
                            <option value="<?=$k["id"]?>"><?= $k["libelle"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="lab">
                    <label for="">Adresse</label>
                    <input type="text" name="adr" id="" value="<?= $ad ?? "" ?>">
                    <p><?= $errors['adr'] ?? "" ?></p>
                </div>
            </div>
            <button type="submit" name="ajouter" value="ajout">Add</button>
        </form>
    </div>
</div>
</body>
</html>