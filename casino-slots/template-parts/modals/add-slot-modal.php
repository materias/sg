<div class="modal" id="addSlotModal">
  <div class="modal__overlay"></div>
  <div class="modal__content">
    <button class="modal__close" id="closeAddSlotModal">&times;</button>
    <form class="form" id="add-slot-form" enctype="multipart/form-data">
      <h2 class="form__title">Ajouter une machine à sous</h2>
      <input class="form__input" type="text" name="slot_title" placeholder="Nom de la machine à sous" required>
      <input class="form__input" type="file" name="slot_image">
      <label class="form__label">
        <input type="checkbox" name="slot_exclusive">
        Exclusif
      </label>
      <button class="form__submit" type="submit">Ajouter</button>
    </form>
  </div>
</div>
