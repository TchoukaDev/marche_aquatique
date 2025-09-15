 <?php
    ob_start();
    foreach ($infos as $info) :
    ?>
     <div id="modal_<?= $info['id'] ?>" class="modal fade" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Confirmation de suppression</h5>
                     <button type="button" class="bouton close" id="closeModalBtn_<?= $info['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             width="16" height="16"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                             <line x1="18" y1="6" x2="6" y2="18" />
                             <line x1="6" y1="6" x2="18" y2="18" />
                         </svg>
                 </div>
                 <div class="modal-body">
                     <p>Êtes-vous sûr de vouloir supprimer cette publication ?</p>
                 </div>
                 <div class="modal-footer">

                     <form method="POST" action="infos_diverses/deleteInfo">
                         <input type="hidden" name="infoId" value="<?= $info['id'] ?>">
                         <?php if (!empty($info['image'])): ?>
                             <input type="hidden" name="infoImage" value="<?= $info['image'] ?>">
                         <?php endif; ?>
                         <button type="button" id="closeFooterModalBtn_<?= $info['id'] ?>" class="bouton">Annuler</button>
                         <button type="submit" id="confirmDeleteBtn_<?= $info['id'] ?>" class="bouton">Confirmer</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <?php
    endforeach;
    $deleteInfoModal = ob_get_clean();
