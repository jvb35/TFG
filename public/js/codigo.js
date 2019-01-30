$(document).ready(function() {
    $(".search").keyup(function () {
      var searchTerm = $(".search").val();
      var listItem = $('.results tbody').children('tr');
      var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
      
    $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
          return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
    });
      
    $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
      $(this).attr('visible','false');
    });
  
    $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
      $(this).attr('visible','true');
    });
  
    var jobCount = $('.results tbody tr[visible="true"]').length;
      $('.counter').text(jobCount + ' item');
  
    if(jobCount == '0') {$('.no-result').show();}
      else {$('.no-result').hide();}
            });
  });

  $(document).ready(function () {

    $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
      });
  
      $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
      });
  
      $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
          $('.table tr').css('display', 'none');
          $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
          $('.table tr').css('display', 'none').fadeIn('slow');
        }
      });
  
   });
