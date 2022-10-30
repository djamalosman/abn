var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

function float_menu_closed(){
    waitForFinalEvent(function(){
        $('#percobaan').css({
            'top': $('.breadcrumbs').outerHeight(true) + $('#header').outerHeight(true)+30,
            'position': 'absolute',
    //            'left': $('#left-panel').outerWidth(true) + 30,
            'left': 280 + 30,
            'width': $(window).width() - 280 - 60,
            'overflow-x': 'scroll'
        });

        $('.kaki').css({
            'margin-top': $('#percobaan').outerHeight(true),
            'width': '100%',
            'border-top': '3px solid gray'        
        }, 500, 'some unique string');        
    })
}

function float_menu_open(){
    waitForFinalEvent(function(){
        $('#percobaan').css({
    //            'top': '150px',
            'top': $('.breadcrumbs').outerHeight(true) + $('#header').outerHeight(true)+30,
            'position': 'absolute',
            'left': 70 + 30,
            'width': $(window).width() - 70 - 60,
            'overflow-x': 'scroll'
        });

        $('.kaki').css({
            'margin-top': $('#percobaan').outerHeight(true),
            'width': '100%',
            'border-top': '3px solid gray'        
        }, 500, 'some unique string');     
    })
}    

function logo_show_hide(){
    if($('body').hasClass('open')){
        $('#dshboard').removeClass('d-none');
        $('.logo-sm-hidelah').hide();
        $('.logo-kecil').show();

        $('aside#left-panel').removeClass('kiri');
    }else{
        $('#dshboard').addClass('d-none');
        $('.logo-sm-hidelah').show();
        $('.logo-kecil').hide();                

        $('aside#left-panel').addClass('kiri');
        $('.logo-sm-hidelah').show();
    }      
}


$(document).ready(function () {
    $('.data').DataTable({
        "pageResize": true,
        "autoWidth": false

    });
    
    $("form#swa-confirm").submit(function() {
        //https://github.com/sweetalert2/sweetalert2
//                    var id = $('#array_id').length;
        var id = $('input:checkbox:checked').length;
        var msg = id>0 ? id+' data yang dipilih akan dihapus' : 'Tidak ada data yang dipilih';
        var textCancel = id>0 ? 'Batal'  : 'OK';
        var showConfirm = id>0 ? true : false;
        Swal({
          title: 'Anda Yakin?',
//                      text: 'Data yang ditandai akan dihapus!',
          text: msg,
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya',
          showConfirmButton: showConfirm,
          cancelButtonText: textCancel
        }).then((result) => {
          if (result.value) {
              document.getElementById("swa-confirm").submit();
          }
        })
        return false;
    });      
    
    var options = $.extend(
            {}, // empty object
            $.datepicker.regional["id"], // fr regional
            {dateFormat: "d MM, y" /*, ... */} // your custom options
    );        

    $(".tanggal").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "DD, d MM yy"
    });       
    
    
    // Update on window resize
    
    $('.tombol').click(function(){
        $('.logo-al').toggle();
        $('#dshboard').toggleClass('d-none');
        $('.logo-sm-hidelah').toggle();
        
        
        if(!$('body').hasClass('open')){
            float_menu_open();
            $('aside#left-panel').removeClass('kiri');
        }else{
            float_menu_closed();
            $('aside#left-panel').addClass('kiri');
        }
    });
    
    
    $( window ).resize( function(){
        if ( xs == true ) { 
            $('body').removeClass('open');
            $('.logo-al').show();  
            $('.logo-sm-hidelah').hide();
            
//            if($('body').hasClass('open')){
//                float_menu_open();
//            }else{
//                float_menu_closed();
//            }
            
            float_menu_sm();
        }
        
        if( sm == true){
//        if( $(window).width() < 768 ){
            logo_show_hide();    
            $('body').addClass('open');
            
            if($('body').hasClass('open')){
                float_menu_open();
            }else{
                float_menu_closed();
            }            
        }
        
        if( md == true){
            logo_show_hide(); 
            $('body').removeClass('open');
            
            if($('body').hasClass('open')){
                float_menu_open();
            }else{
                float_menu_closed();
            }            
        }
        
        if( lg == true){
            logo_show_hide(); 
            $('body').removeClass('open');
        }

    }); 
    
    

    float_menu_closed();    
});