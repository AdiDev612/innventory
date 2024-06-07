const goBack = () => {
    window.history.back();
  };
  
  // Add a click event listener to the back button
  const backButton = document.getElementById('back-button');
  backButton.addEventListener('click', goBack);

  $(function(){
    $('.bars li .bar').each(function(key, bar){
      var percentage = $(this).data('percentage');
      $(this).animate({
        'height' : percentage + '%'
      },1000);
    });
  });