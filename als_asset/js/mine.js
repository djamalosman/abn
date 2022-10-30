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
            $('aside#left-panel').removeClass('kiri');
        }else{
            $('aside#left-panel').addClass('kiri');
        }
    });
    
    
    $( window ).resize( function(){
        if ( xs == true ) { 
            $('body').removeClass('open');
            $('.logo-al').show();  
            $('.logo-sm-hidelah').hide();
        }
        
        if( sm == true){
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
});