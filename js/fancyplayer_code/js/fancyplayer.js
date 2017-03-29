var videopath = "http://localhost/jquery-plugins/fancyplayer_code/";
var swfplayer = videopath + "videos/flowplayer-3.1.1.swf";

jQuery(document).ready(function($) {

    var videoclip = $("span.video_portada").html();

    $(".views-field-field-video").append('<a class="video_fancy" href="#video_box">kk</a>');

    $(".video_fancy").fancybox({
        'hideOnContentClick':false,
        'overlayOpacity' :.6,
        'zoomSpeedIn'    :400,
        'zoomSpeedOut'   :400,
        'easingIn'		 : 'easeOutBack',
        'easingOut'		 : 'easeInBack',
        'callbackOnShow' :function(){
            player = $f("fancy_div",swfplayer,{
                play:{
                    opacity:0
                },
                clip:{
                    autoPlay:true,
                    autoBuffering:true,
                    url:videoclip,
                    onStart:function(clip){
                        var wrap=jQuery(this.getParent());
                        var clipwidth = clip.metaData.width;
                        var clipheight= clip.metaData.height;
                        var pos = $.fn.fancybox.getViewport();
                        $("#fancy_outer").css({
                            width:clipwidth,
                            height:clipheight
                        });
                        $("#fancy_outer").css('left', ((clipwidth + 36) > pos[0] ? pos[2] : pos[2] + Math.round((pos[0] - clipwidth	- 36)	/ 2)));
                        $("#fancy_outer").css('top',  ((clipheight + 50) > pos[1] ? pos[3] : pos[3] + Math.round((pos[1] - clipheight - 50)	/ 2)));
                    },
                    onFinish:function(){
                        $('#fancy_close').trigger('click');
                    }
                }
            });
            player.load();
            $('#fancy_close').click(function(){
                $("#fancy_div_api").remove();
            });
        },
        'callbackOnClose':function(){
            $("#fancy_div_api").remove();
        }
    });
}); 