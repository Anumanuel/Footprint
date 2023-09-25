jQuery(document).ready(function($){
// Get current path and find target link
var path = 
window.location.pathname.split("/").pop();

// Account for home with empty path
if ( path == '' ) {
    path = 'index.php'
}

var target = $('navigation a[href="'+path+'"]');
// add active class to target link
target.addClass('active');
});