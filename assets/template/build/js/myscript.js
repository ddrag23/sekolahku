console.log('myscript')
// date picker {{
   $('#myDatepicker2').datetimepicker({
      format: 'DD.MM.YYYY'
    });
   $(document).ready(function() {
     $('.ex-select2').select2();
    });
// }}

// flash message sukses{{
  const flashdata = $('.flash-data').data('flashdata')
if (flashdata) {
  new PNotify({
    title: 'Data Siswa',
    text: 'Data Berhasil'+flashdata,
    type: 'success',
    styling: 'bootstrap3'
  })
}
// }}

// flash message error{{
 const flashErrors = $('flash-error').data('flasherror')
console.log(flashErrors)
  if (flashErrors) {
    new PNotify({
      title: 'Data Siswa',
      text: 'tolong'+flashErrors,
      type: 'error',
      styling: 'bootstrap3'
    })
  }
// }}
