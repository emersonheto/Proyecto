<script>
  $("#deleteModal").on('show.bs.modal', function (event) {
      var btn = $(event.relatedTarget)
      var file_id = btn.data('file-id')
      var modal = $(this)
      modal.find('.modal-body #file_id').val(file_id);
  })
</script>