InitSystem();
InitSystemMobile();

  function InitSystem(event){
  if (window.innerWidth > 768) {
    document.querySelector("#sidenav-menu");

  createcv = document.createElement('i');
  createcv.setAttribute('class', 'fa fa-window-close');
  createcv.setAttribute('onclick','closeNav()');
  insertCV = document.querySelector('#sidenav-menu');
  insertCV.appendChild(createcv);
}
};

function InitSystemMobile(event){
  if (window.innerWidth < 768) {
    document.querySelector("#sidenav-menu");

  createcv = document.createElement('i');
  createcv.setAttribute('class', 'fa fa-bars');
  createcv.setAttribute('onclick','openMobile()');
  insertCV = document.querySelector('#sidenav-menu');
  insertCV.appendChild(createcv);
}
};

  window.onresize = function(event) {
   if(window.innerWidth < 768 ) {
     document.querySelector("i",".fa fa-window-close").remove(); 
     document.getElementById("menu-sidenav").style.marginLeft = "0";
     document.getElementById("menu-sidenav").style.width = "";
     document.getElementById("menu-header").style.marginLeft = "0";
     document.getElementById("menu-header").style.width = "";
     document.getElementById("main").style.marginLeft = "0";
     document.getElementById("main").style.width = "";  

     createcv = document.createElement('i');
     createcv.setAttribute('class', 'fa fa-bars');
     createcv.setAttribute('onclick','openMobile()');
     insertCV = document.querySelector('#sidenav-menu');
     insertCV.appendChild(createcv);
   }else{
    openNav();
  }
};

function openNav(event) {
  if(window.innerWidth > 768 ){
    document.getElementById("menu-sidenav").style.marginLeft = "0";
    document.getElementById("menu-sidenav").style.width = "";
    document.getElementById("menu-header").style.marginLeft = "0";
    document.getElementById("menu-header").style.width = "";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("main").style.width = "";
    document.querySelector("i",".fa fa-bars").remove();
    createcv = document.createElement('i');
    createcv.setAttribute('class', 'fa fa-window-close');
    createcv.setAttribute('onclick','closeNav()');
    insertCV = document.querySelector('#sidenav-menu');
    insertCV.appendChild(createcv);
  }
};

function closeNav(event) {
  if(window.innerWidth > 768 ){
    document.getElementById("menu-sidenav").style.marginLeft = "-250px";
    document.getElementById("menu-header").style.marginLeft = "-250px";
    document.getElementById("menu-header").style.width = "100%";
    document.getElementById("main").style.marginLeft = "-250px";
    document.getElementById("main").style.width = "100%";
    document.querySelector("i",".fa fa-window-close").remove();
    createcv = document.createElement('i');
    createcv.setAttribute('class', 'fa fa-bars');
    createcv.setAttribute('onclick','openNav()');
    insertCV = document.querySelector('#sidenav-menu');
    insertCV.appendChild(createcv);
  }
};

function openMobile(event) {
  if(window.innerWidth <= 768){
  document.getElementById("menu-sidenav").style.marginLeft = "";
  document.getElementById("menu-sidenav").style.width = "250px";
  document.getElementById("menu-header").style.marginLeft = "250px";
  document.getElementById("menu-header").style.width = "";
  document.getElementById("main").style.marginLeft = "35%";
  document.getElementById("main").style.width = "";
  document.querySelector("i",".fa fa-bars").remove();

  createcv = document.createElement('i');
  createcv.setAttribute('class', 'fa fa-window-close');
  createcv.setAttribute('onclick','closeMobile()');
  insertCV = document.querySelector('#sidenav-menu');
  insertCV.appendChild(createcv);
}
};

function closeMobile(event) {
  if (window.innerWidth < 768) {
  document.getElementById("menu-sidenav").style.marginLeft = "-250px";
  document.getElementById("menu-header").style.marginLeft = "";
  document.getElementById("menu-header").style.width = "100%";
  document.getElementById("main").style.marginLeft = "";
  document.getElementById("main").style.width = "100%";
 
  document.querySelector("i",".fa fa-window-close").remove();

  createcv = document.createElement('i');
  createcv.setAttribute('class', 'fa fa-bars');
  createcv.setAttribute('onclick','openMobile()');
  insertCV = document.querySelector('#sidenav-menu');
  insertCV.appendChild(createcv);
}
};