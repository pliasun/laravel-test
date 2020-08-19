const listItems = document.querySelectorAll('.list-group-item');

if (listItems.length > 0) {
  listItems.forEach(item => {
    item.addEventListener('click', function() {
      listItems.forEach(item => {
        item.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
}
