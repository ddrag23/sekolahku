window.addEventListener('scroll', function(){
  // variable
  const navbar = this.document.getElementById('mynavbar');
  let infoSyarat = this.document.querySelector('.info-syarat');
  let infoPrestasti = this.document.querySelector('.info-prestasi');
  let contactUs = this.document.querySelector('.contact-us');
  const jumbotron = this.document.querySelector('.jumbotron');
  const childJumbotronLead = jumbotron.querySelector('.lead');
  const childJumbotronH = jumbotron.querySelector('.display-4');
  const btn = jumbotron.querySelector('.btn-group');
  //end
  let wscroll = window.pageYOffset;

  //navbar
  if (wscroll > navbar.offsetTop) {
    navbar.classList.add('fixed-top');
  }else if (wscroll < 74) {
    navbar.classList.remove('fixed-top');
  }
  //end

  //jumbotron
  jumbotron.style.transform = 'translateY(0px'+wscroll/4+'%)';
  childJumbotronLead.style.transform = 'translateY(0px'+wscroll/2 +'%)'
  childJumbotronH.style.transform = 'translateY(0px'+wscroll/2 +'%)'
  btn.style.transform = 'translateY(0px'+wscroll/1.5 +'%)'
  //end
  if (wscroll > infoSyarat.offsetTop - 600) {
    infoSyarat.classList.add('muncul');
  }
  if (wscroll > infoPrestasti.offsetTop - 500) {
    infoPrestasti.classList.add('muncul');
  }

  if (wscroll > contactUs.offsetTop - 500) {
    contactUs.classList.add('anim');
  }
})
