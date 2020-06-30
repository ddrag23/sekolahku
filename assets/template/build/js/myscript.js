console.log('myscript')
//variabel{{
const path = location.pathname.split('/')
let controller = path[2].charAt(0).toUpperCase() + path[2].slice(1)
const flashLogin = $('#sukses').data('flashdata');
const getDataLoginName = $('#sukses').data('name');
const flashErrors = $('#error').data('error');
const flashdata = $('.flash-data').data('flashdata');
//}}

// date picker {{
      $(document).ready(function() {
     $('.ex-select2').select2();
    });
// }}

// flash message sukses{{

if (flashdata) {
  new PNotify({
    title: 'Data ' + controller,
    text: 'Data Berhasil '+flashdata,
    type: 'success',
    styling: 'bootstrap3'
  });
}

if(flashLogin){
  new PNotify({
    title : 'Hallo ' + getDataLoginName ,
    text : flashLogin,
    type : 'success',
    styling : 'bootstrap3'
  });
}
// }}

// flash message error{{
  if (flashErrors) {
    new PNotify({
      title: 'Data ' + controller,
      text: flashErrors,
      type: 'error',
      styling: 'bootstrap3'
    })
  }
// }}


