jQuery(document).ready(function($) {
  $.icndb.getRandomJoke(function(result) {

    $('.joke-wrapp').text(result.joke);

  });
});
