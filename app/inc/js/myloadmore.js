jQuery(function ($) { // use jQuery code inside this to avoid "$ is not defined" error
  $('.loadmore').click(function () {

    var button = $(this),
      data = {
        'action': 'load_reviews_by_ajax',
        'query': load_more_reviews.posts, // that's how we get params from wp_localize_script() function
        'page': load_more_reviews.current_page,
        'security': load_more_reviews.security
      };


    $.ajax({ // you can also use $.post here
      url: load_more_reviews.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend: function (xhr) {

        button.html('Загружаются проекты...');
           // change the button text, you can also add a preloader image

      },
      success: function (data) {
        // console.log(data);
        if (data) {
          button.html('Больше проектов');

          $('.projects__grid').append(data); // insert new posts
          load_more_reviews.current_page++;


          if (load_more_reviews.current_page == load_more_reviews.max_page)
            button.remove(); // if last page, remove the button

          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      },
      error: function (data) {
        // console.log(data);
      }
    });
  });
});
