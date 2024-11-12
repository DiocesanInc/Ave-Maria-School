jQuery(document).ready(($)=>{
  // set initID
  const initID  = $('.tabs-container .tabs-tabs .nav-tab').first().attr('data-controls');

  if(initID) {
    // initialize
    $('.tabs-container').attr('data-active', initID);
    $(`#${initID}, #${initID.replace('tab-', 'nav-')}`).addClass('active');
  }

  // handle events
  $('.tabs-container .tabs-tabs').on('click', '.nav-tab', function(){
    const clicked = $(this).attr('data-controls');

    // clear state
    $('.tabs-container .tabs-tabs .nav-tab, .tabs-container .tabs-content .tab-content').removeClass('active');

    if(clicked) {
      // set updates
      $('.tabs-container').attr('data-active', clicked);
      $(`#${clicked}, #${clicked.replace('tab-', 'nav-')}`).addClass('active');
    }

    $(this).blur();
  });
});
