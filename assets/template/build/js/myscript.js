console.log('myscript')
//variabel{{
var path = location.pathname.split('/')
var controller = path[2].charAt(0).toUpperCase() + path[2].slice(1)
const flashdata = $('.flash-data').data('flashdata');
//}}

// date picker {{
   $('#myDatepicker2').datetimepicker({
      format: 'DD.MM.YYYY'
    });
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
// }}

// flash message error{{
 const flashErrors = $('#error').data('error')
// console.log(flashErrors)
  if (flashErrors) {
    new PNotify({
      title: 'Data ' + controller,
      text: flashErrors,
      type: 'error',
      styling: 'bootstrap3'
    })
  }
// }}
function showTime(){
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";

      if(h == 0){
                h = 12;
            }
      
      if(h > 12){
                h = h - 12;
                session = "PM";
            }
      
      h = (h < 10) ? "0" + h : h;
      m = (m < 10) ? "0" + m : m;
      s = (s < 10) ? "0" + s : s;
      
      var time = h + ":" + m + ":" + s + " " + session+'", ';
      document.getElementById("systime").innerText = time;
      setTimeout(showTime, 1000);
}

function showDate(){
  var fullMount = new Array();
  fullMount[0] = "Januari";
  fullMount[1] = "Februari";
  fullMount[2] = "Maret";
  fullMount[3] = "April";
  fullMount[4] = "Mei";
  fullMount[5] = "Juni";
  fullMount[6] = "Juli";
  fullMount[7] = "Agustus";
  fullMount[8] = "September";
  fullMount[9] = "Oktober";
  fullMount[10] = "November";
  fullMount[11] = "Desember";
  var fullDay = new Array();
  fullDay[0] = "Minggu";
  fullDay[1] = "Senin";
  fullDay[2] = "Selasa";
  fullDay[3] = "Rabu";
  fullDay[4] = "Kamis";
  fullDay[5] = "Jum'at";
  fullDay[6] = "Sabtu";
  var date = new Date();
  var y = date.getFullYear();
  var m = fullMount[date.getMonth()];
  var t = date.getDay();
  var d = fullDay[date.getDay()];
  var now = d + " - "+ t + " " + m + " " + y  
  document.getElementById("sysdate").innerText = now;
}

//Run Function{{
showTime();
showDate()
//}}

