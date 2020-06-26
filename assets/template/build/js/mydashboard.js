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
      document.getElementById("systime").textContent = time;
      setTimeout(showTime, 1000);
}

function showDate(){
  const fullMount = new Array();
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
  const fullDay = new Array();
  fullDay[0] = "Minggu";
  fullDay[1] = "Senin";
  fullDay[2] = "Selasa";
  fullDay[3] = "Rabu";
  fullDay[4] = "Kamis";
  fullDay[5] = "Jum'at";
  fullDay[6] = "Sabtu";
  const date = new Date();
  const y = date.getFullYear();
  const m = fullMount[date.getMonth()];
  const t = date.getDate()
  const d = fullDay[date.getDay()];
  const now = d + " - "+ t + " " + m + " " + y  
  document.getElementById("sysdate").innerText = now;
  document.getElementById("sysdate").textContent = now;
}


//Run Function{{
showTime();
showDate()
//}}

