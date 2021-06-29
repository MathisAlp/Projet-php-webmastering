<?php

use ism\lib\Role;
use ism\lib\Session; ?>
<nav class="navbar navbar-expand-sm navbar-light bg-info mt-1 mb-4">
    <a class="navbar-brand" href="<?php path('etudiant/showCatalogue') ?>">MES fonctionalités</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <?php if (Role::estEt()) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('etudiant/showFonctionnaliteByEtudiant/' . Session::getSession("user_connect")['matricule']) ?>">Lister mes cours </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('etudiant/showFonctionnaliteByEtudiant/' . Session::getSession("user_connect")['matricule']) ?>">Lister mes absences </a>
                </li>
            <?php endif ?>
            <?php if (Role::estAdmin()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/addRp') ?>">Ajouter un RP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/deleteRp') ?>">Supprimer un RP</a>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/updateRp') ?>">Modifier un RP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/addAc') ?>">Ajouter un AC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/deleteAc') ?>">Supprimer un AC</a>
                <li class="nav-item">
                    <a class="nav-link" href="<?php path('security/updateAc') ?>">Modifier un AC</a>
                </li>
            <?php endif ?>
            <?php if (Role::estProf()) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('professeur/showCours/' . Session::getSession("user_connect")['matricule_prof']) ?>">Lister mes cours </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('professeur/showEtudiant/' . Session::getSession("user_connect")['matricule_prof']) ?>">Lister les etudiants </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('professeur/makeAbs/' . Session::getSession("user_connect")['matricule_prof']) ?>">Marquez absences d'un cours </a>
                </li>
            <?php endif ?>
            <?php if (Role::estAC()) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('ac/addEtudiant/' . Session::getSession("user_connect")['id_ac']) ?>">inscrire un etudiant </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('ac/listerEtudiant/' . Session::getSession("user_connect")['id_ac']) ?>">liste les etudiants </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('ac/listerCours/' . Session::getSession("user_connect")['id_ac']) ?>">lister cours </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('ac/Filtrer/' . Session::getSession("user_connect")['id_ac']) ?>">Filtrer etudiants </a>
                </li>
            <?php endif ?>
            <?php if (Role::estRP()) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('rp/addProf/' . Session::getSession("user_connect")['id_ac']) ?>">ajouter professeur </a>
                </li>
            <?php endif ?>

            <?php if (Role::estRP()) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('rp/listerEtudiant/' . Session::getSession("user_connect")['id_ac']) ?>">liser les etudiants </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('rp/planifCours/' . Session::getSession("user_connect")['id_ac']) ?>">planifier un cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php path('rp/listerCours/' . Session::getSession("user_connect")['id_ac']) ?>">listerCours </a>
                </li>
            <?php endif ?>




            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parametre</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <?php if (!Role::estConnect()) : ?>
                        <a class="dropdown-item" href="<?php path('security/login') ?>">Connexion</a>
                    <?php endif ?>
                    <?php if (Role::estConnect()) : ?>
                        <a class="dropdown-item" href="<?php path('security/logout') ?>">Deconnexion</a>
                    <?php endif ?>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php if (Role::estConnect()) : ?>
                <li class="nav-item">
                    <?= Session::getSession("user_connect")["nom_complet"];
                    ?>
                </li>
            <?php endif ?>

        </ul>

    </div>
</nav>