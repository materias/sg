document.getElementById('openAddSlotModal').onclick = function() {
	document.getElementById('addSlotModal').classList.add('modal--active');
  };
  document.getElementById('closeAddSlotModal').onclick = function() {
	document.getElementById('addSlotModal').classList.remove('modal--active');
  };
  document.querySelector('#addSlotModal .modal__overlay').onclick = function() {
	document.getElementById('addSlotModal').classList.remove('modal--active');
  };