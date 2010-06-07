 $(document).ready(function() { 
                $('.confirmClick').live('click',function() {
                    var q = 'Are you sure you want to do this action?';
                    var t = $(this).attr('title');
                    if (t.length > 0) q = 'Are you sure you want to ' + t.toLowerCase() + '?';
                    var c = confirm(q);
                    return c;
                });
            });