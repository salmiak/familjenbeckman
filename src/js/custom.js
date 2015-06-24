// Put all your lovely jQuery / Javascript goodies right down here.

$(window).load(function(){
  var nbrOfArticles = 0;
  $("#main").bind("DOMSubtreeModified", function() {
    var newNbrOfArticles = $("#main article.post").length;
    if(newNbrOfArticles > nbrOfArticles) {
      nbrOfArticles = newNbrOfArticles;
      console.log('more articles: ' + newNbrOfArticles);
      $('.js-flickity:not(.flickity-enabled)').each(function(){
        console.log('enabled');
        $(this).flickity($(this).data('flickity-options'));
      });
    }
  });
  
});