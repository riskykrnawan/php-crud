$('#search').on('keyup', function() {
  $('.container-fluid').load(`ajax/blackclover.php?search=${$('#search').val()}`)
});