 <div class="menu-liste">
     <label for="tache">Sélectionnez une tâche :</label>
     <select name="id_tache" id="tache" onchange="remplirChamps();">
         <option value="">Sélectionnez une tâche</option>
         <?php foreach ($taches as $tache) : ?>
             <option value="<?php echo $tache->getIdTache(); ?>"
                 data-titre="<?php echo htmlspecialchars($tache->getTitre()); ?>"
                 data-description="<?php echo htmlspecialchars($tache->getDescription()); ?>"
                 data-date="<?php echo $tache->getDateEcheance(); ?>"
                 data-statut="<?php echo htmlspecialchars($tache->getStatut()); ?>">
                 <?php echo $tache->getIdTache() . ' -- ' . $tache->getTitre() . ' -- ' . $tache->getDescription(); ?>
             </option>
         <?php endforeach; ?>
     </select>