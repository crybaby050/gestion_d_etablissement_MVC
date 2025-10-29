        <form action="" method="post">
            <input type="hidden" name="page" value="dashboard">
        </form>
        <div class="elem">
            <div class="titre">
                <div class="ti">
                    <h1>DASHBOARD</h1>
                    <!-- <p>Realiser par seydina ababacar ben thiam etudiant en L1</p> -->
                </div>
                <div class="bout">
                    <button class="add"><a href="<?=WEBROOT?>?page=ajout_etudiant" style="text-decoration: none;color:white;">+ Add Etudiant</a></button>
                    <button class="imp"><a href="<?=WEBROOT?>?page=liste_etudiant" style="text-decoration: none;color:rgb(42, 98, 255);">Voir Etudiant</a></button>
                </div>
            </div>
            <div class="pl">
                <div class="pls">
                    <div class="c1">
                        <p class="p1">Nombre d'étudians</p>
                        <h1><?= $nbEtudiants ?></h1>
                        <p class="p2">6 dernier mois</p>
                    </div>
                    <div class="c2">
                        <div class="cir">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="pls">
                    <div class="c1">
                        <p class="p1">Nombre de classe</p>
                        <h1><?= $nbClasse ?></h1>
                        <p class="p2">6 dernier mois</p>
                    </div>
                    <div class="c2">
                        <div class="cir">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="pls">
                    <div class="c1">
                        <p class="p1">Nombre de filière</p>
                        <h1><?= $nbFilliere ?></h1>
                        <p class="p2">6 dernier mois</p>
                    </div>
                    <div class="c2">
                        <div class="cir">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="pls">
                    <div class="c1">
                        <p class="p1">Nombre de niveau</p>
                        <h1><?= $nbNiveau ?></h1>
                        <p class="p2">6 dernier mois</p>
                    </div>
                    <div class="c2">
                        <div class="cir">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rest">
                <div class="a1">
                    <div class="b1">
                        <div class="diag">
                            <p>Projet analitics</p>
                            <div class="bar">
                                <div class="col">
                                    <div class="bleu1"></div>
                                    <h2>S</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu2"></div>
                                    <h2>M</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu3"></div>
                                    <h2>T</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu4"></div>
                                    <h2>W</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu5"></div>
                                    <h2>T</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu6"></div>
                                    <h2>F</h2>
                                </div>
                                <div class="col">
                                    <div class="bleu7"></div>
                                    <h2>S</h2>
                                </div>
                            </div>
                        </div>
                        <div class="meet">
                            <p class="m1">Remind me</p>
                            <p class="m2">MEETING WITH BEN COMPANY</p>
                            <p class="m3">Time: 02.00 pm - 4:00 pm</p>
                            <button><i class="fa-solid fa-video"></i>Start meeting</button>
                        </div>
                    </div>
                    <div class="b2">
                        <div class="our">
                            <p>Our projects</p>
                            <div class="pre">
                                <div class="case">
                                    <div class="rnd"></div>
                                    <div class="inf">
                                        <div class="nm">
                                            <h3>Ben vpn</h3>
                                            <button>Details</button>
                                        </div>
                                        <p>Le vpn le plus rapide et le plus securiser du senegal avec des serveurs placé dans le monde entier</p>
                                    </div>
                                </div>
                                <div class="case">
                                    <div class="rnd"></div>
                                    <div class="inf">
                                        <div class="nm">
                                            <h3>Ben vpn</h3>
                                            <button>Details</button>
                                        </div>
                                        <p>Le vpn le plus rapide et le plus securiser du senegal avec des serveurs placé dans le monde entier</p>
                                    </div>
                                </div>
                                <div class="case">
                                    <div class="rnd"></div>
                                    <div class="inf">
                                        <div class="nm">
                                            <h3>Ben vpn</h3>
                                            <button>Details</button>
                                        </div>
                                        <p>Le vpn le plus rapide et le plus securiser du senegal avec des serveurs placé dans le monde entier</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cur">
                            <p>Current project</p>
                            <div class="rent">
                                <div class="rnd1"></div>
                                <div class="inf1">
                                        <div class="nm1">
                                            <h3>Ben vpn</h3>
                                            <button>Details</button>
                                        </div>
                                        <p>Le vpn le plus rapide et le plus securiser du senegal avec des serveurs placé dans le monde entier</p>
                                </div>
                            </div>
                            <div class="proj">
                                <h3>Progression</h3>
                                <p>13 %</p>
                                <div class="tre">
                                    <div class="ligne">
                                        <div class="pligne"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="a2">
                    <div class="ca">
                        <div class="team">
                            <p>Team Members</p>
                            <button>+ Add member</button>
                        </div>
                        <div class="memb">
                            <div class="rnde"></div>
                            <p>Ben <strong>THIAM</strong><br>Developpeur fullstack - Designer - Graphiste</p>
                        </div>
                        <div class="memb">
                            <div class="rnde"></div>
                            <p>Ben <strong>THIAM</strong><br>Developpeur fullstack - Designer - Graphiste</p>
                        </div>
                        <div class="memb">
                            <div class="rnde"></div>
                            <p>Ben <strong>THIAM</strong><br>Developpeur fullstack - Designer - Graphiste</p>
                        </div>
                        <div class="memb">
                            <div class="rnde"></div>
                            <p>Ben <strong>THIAM</strong><br>Developpeur fullstack - Designer - Graphiste</p>
                        </div>
                    </div>
                    <div class="cb">
                        <p class="pa">Time tracker</p>
                        <p class="timer">01:00:25</p>
                    </div>
                </div>
            </div>
        </div>