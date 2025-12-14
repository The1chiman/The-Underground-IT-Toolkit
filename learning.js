$(document).ready(function() {
  $('.mark-done-btn').click(function() {
    const block = $(this).closest('.learning-block');
    const subjectId = block.data('subject-id');
    const cardId = block.data('card-id');
    const button = $(this);

    $.ajax({
      type: 'POST',
      url: 'update_progress.php',
      data: { subject_id: subjectId, card_id: cardId },
      success: function(response) {
        const res = JSON.parse(response);
        if (res.status === 'success') {
          button.text('✔ Done').prop('disabled', true);
          $('#subject-progress').text('Progress: ' + res.progress + '%');
        } else {
          Swal.fire('Error', res.message || 'Something went wrong.', 'error');
        }
      },
      error: function() {
        Swal.fire('Error', 'Could not connect to server.', 'error');
      }
    });
  });
});
