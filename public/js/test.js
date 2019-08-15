$(document).ready(function () {
  for(var i=0; i<6; i++){
  $('#datetimepicker'+i).datetimepicker({
    locale: 'ja',
    dayViewHeaderFormat: 'YYYY年 M月',
    format: 'YYYY年MM月DD日'
  });
  }
});

$(document).ready(function() {
  $("#add_button").click(function() {
    // #my_buttonがクリックされた時にここが実行される
    const clonedForm = document.querySelector(".processes").cloneNode(true);
    $(".append_area").append(clonedForm);
  });
});