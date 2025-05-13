<main>
  <div class="container_img_background container_principal">
    <section class="carousel">
      <h2>Galerie Photos</h2>

      <?php if (isset($_SESSION['admin'])) :
        if (isset($_SESSION['galleryError'])): ?>
          <p class="error text_center"><?= $_SESSION['galleryError'];
                                        unset($_SESSION['galleryError']) ?>
          </p>
        <?php endif;
        if (isset($_SESSION['gallerySuccess'])): ?>
          <p class="success text_center"><?= $_SESSION['gallerySuccess'];
                                          unset($_SESSION['gallerySuccess']) ?>
          </p>
        <?php endif;
        ?>

        <form class="adminForm" method="POST" action='galerie/addImage' enctype="multipart/form-data">
          <p>
            <label for="image">Ajouter une image:</label><br>
          </p>
          <p>
            <input type="file" name="images[]" multiple required>
          </p>
          <p>
            <button type="submit" class="bouton">Ajouter</button>
          </p>
        </form>
      <?php endif; ?>

      <div class="carousel-container">

        <?php foreach ($images as $index => $image) : ?>

          <div class="slide">
            <img src="public/uploads/gallery/<?= $image['image'] ?>" alt="slide<?= $index + 1 ?>">
          </div>
        <?php endforeach ?>

        <div class="controls">
          <a class="prev">&#10094;</a>
          <a class="next">&#10095;</a>
        </div>
      </div>
      <form method="POST" action="galerie/deleteImage">
        <div class="slide-progress">
          <?php foreach ($images as $image) : ?>
            <div class="imagesCheckbox">
              <div style="background-image: url(public/uploads/gallery/<?= $image['image'] ?>)" class="thumbnail"></div>
              <?php if (isset($_SESSION['admin'])): ?>
                <input type=checkbox name="imagesName[]" value="<?= $image['image'] ?>">
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (isset($_SESSION['admin'])): ?>
          <p>
            <button type="submit">Supprimer les images sélectionnées</button>
          </p>
        <?php endif; ?>
      </form>
    </section>
  </div>
</main>