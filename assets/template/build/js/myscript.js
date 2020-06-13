console.log('myscript')
//variabel{{
const path = location.pathname.split('/')
let controller = path[2].charAt(0).toUpperCase() + path[2].slice(1)
const flashdata = $('.flash-data').data('flashdata');
const flashErrors = $('#error').data('error')
const flashLogin = document.getElementById('sukses');
const getDataLogin = flashLogin.dataset.flashdata;
const getDataLoginName = flashLogin.dataset.name;
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

if(getDataLogin){
  new PNotify({
    title : 'Hallo ' + getDataLoginName ,
    text : getDataLogin,
    type : 'success',
    styling : 'bootstrap3'
  });
}
// }}

// flash message error{{
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
      let date = new Date();
      let h = date.getHours(); // 0 - 23
      let m = date.getMinutes(); // 0 - 59
      let s = date.getSeconds(); // 0 - 59
      let session = "AM";

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
      
      let time = h + ":" + m + ":" + s + " " + session+'", ';
      document.getElementById("systime").innerText = time;
      setTimeout(showTime, 1000);
}

function showDate(){
  let fullMount = new Array();
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
  let fullDay = new Array();
  fullDay[0] = "Minggu";
  fullDay[1] = "Senin";
  fullDay[2] = "Selasa";
  fullDay[3] = "Rabu";
  fullDay[4] = "Kamis";
  fullDay[5] = "Jum'at";
  fullDay[6] = "Sabtu";
  let date = new Date();
  let y = date.getFullYear();
  let m = fullMount[date.getMonth()];
  let t = date.getDay();
  let d = fullDay[date.getDay()];
  let now = d + " - "+ t + " " + m + " " + y  
  document.getElementById("sysdate").innerText = now;
}

var ctx = document.getElementById('chartBar').getContext('2d')
var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                              label: '# of Votes',
                              data: [12, 19, 3, 5, 2, 3],
                              backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                              borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                              borderWidth: 1
                          }]
            },
      options: {
                scales: {
                              yAxes: [{
                                                ticks: {
                                                                      beginAtZero: true
                                                                  }
                                            }]
                          }
            }
});

//Run Function{{
showTime();
showDate()
//}}

