var type = "Isocele";
var voice= new Audio('../../sources/Isocele.mp3');
var on = false;


$('#voice').click(function (){
    on = !on;
    if (on){
        voice.play();
    }
    else {
        voice.pause();
    }
})

$('.options').click(function (){
    type = $(this).attr('id');
    $('#frame').attr('src',type+".html");
    voice.pause();
    voice.src='../../sources/'+type+'.mp3';

});

$('#draw').click(function (){
    window.location = "../draw/Draw.php?type="+type;
})

