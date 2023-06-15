"use strict";
var notify = $.notify(
  '<i class="fas fa-bell"></i></i><strong>Loading</strong> page Do not close this page...',
  {
    type: "theme",
    allow_dismiss: true,
    delay: 1000,
    showProgressbar: true,
    timer: 100,
    // timer: 555555500,
    animate: {
      enter: "animated fadeInDown",
      exit: "animated fadeOutUp",
    },
  }
);

// setTimeout(function () {
//   notify.update(
//     "message",
//     '<i class="fas fa-bell"></i></i><strong>Loading</strong> Inner Data. fuat'
//   );
// }, 1000);
