<?php
function renderDeleteModal($id, $nameInputId, $action, $message = "Êtes-vous sûr de vouloir supprimer ?", $hiddenFields = [])
{
    ob_start();
?>
    <div id="modal_<?= $id ?>" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation de suppression</h5>
                    <button type="button" class="bouton close" id="closeModalBtn_<?= $id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            width="16" height="16"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?= htmlspecialchars($message) ?></p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="<?= $action ?>">
                        <input type="hidden" name=<?= $nameInputId ?> value="<?= $id ?>">
                        <?php foreach ($hiddenFields as $name => $value): ?>
                            <input type="hidden" name="<?= htmlspecialchars($name) ?>" value="<?= htmlspecialchars($value) ?>">
                        <?php endforeach; ?>
                        <button type="button" id="closeFooterModalBtn_<?= $id ?>" class="bouton">Annuler</button>
                        <button type="submit" id="confirmDeleteBtn_<?= $id ?>" class="bouton">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
