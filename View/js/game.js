var time = 30;
var nbr = 0;
var score = 0;


var point1X = 0;
var point1Y = 0;
var point2X = 0;
var point2Y = 0;
var point3X = 0;
var point3Y = 0;
var point4X = 0;
var point4Y = 0;

var rightCoord = [[408,260,548,395,687,122],[408,121,409,258,549,258],[409,122,271,258,547,260], [408,123,408,532,687,531], [270,122,408,121,409,258],
    [687,529,688,123,271,122],[333,129,300,193,371,193],[548,1,131,257,964,259],[132,396,132,122,966,121],
    [547,530,269,396,826,396], [480,257,409,396,548,394],[131,257,547,121,548,395],
];
var rectangleCoord = [[410,258,408,530,966,533,966,261],[270,531,826,530,826,260,270,258],[410,529,410,258,546,259,548,530],
    [688,531,688,122,824,121,827,531],[965,122,966,530,687,530,686,122],[131,123,132,259,549,258,548,123]];

function generateShape(ctx){
    
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (nbr === 3){
        var index = Math.floor(Math.random()*rectangleCoord.length);
        point1X = rectangleCoord[index][0];
        point1Y = rectangleCoord[index][1];
        point2X = rectangleCoord[index][2];
        point2Y = rectangleCoord[index][3];
        point3X = rectangleCoord[index][4];
        point3Y = rectangleCoord[index][5];
        point4X = rectangleCoord[index][6];
        point4Y = rectangleCoord[index][7];
        ctx.beginPath()
        ctx.moveTo(point1X,point1Y);
        ctx.lineTo(point2X,point2Y);
        ctx.stroke();
        ctx.moveTo(point2X,point2Y);
        ctx.lineTo(point3X,point3Y);
        ctx.stroke();
        ctx.moveTo(point3X,point3Y);
        ctx.lineTo(point4X,point4Y);
        ctx.stroke();
        ctx.moveTo(point4X,point4Y);
        ctx.lineTo(point1X,point1Y);
        ctx.stroke();
        ctx.closePath();
        nbr = 0;
    }
    else {
        if (nbr ===1){

            point1X = Math.floor(Math.random()*580);
            point1Y = Math.floor(Math.random()*580);
            point2X = Math.floor(Math.random()*580);
            point2Y = Math.floor(Math.random()*580);
            while (point1X == point2X && point1Y == point2Y){
                point2X = Math.floor(Math.random()*580);
                point2Y = Math.floor(Math.random()*580);
            }
            point3X = Math.floor(Math.random()*580);
            point3Y = Math.floor(Math.random()*580);
            while ((point3X == point1X && point3Y == point1Y) || 
             (point3X == point2X && point3Y == point2Y)){
                point2X = Math.floor(Math.random()*580);
                point2Y = Math.floor(Math.random()*580);
            }
            nbr = 3;

        }
        else if(nbr === 0){
            var index = Math.floor(Math.random()*rightCoord.length);
            point1X = rightCoord[index][0];
            point1Y = rightCoord[index][1];
            point2X = rightCoord[index][2];
            point2Y = rightCoord[index][3];
            point3X = rightCoord[index][4];
            point3Y = rightCoord[index][5];
            nbr = 1;
        }
        point4X = 0;
        point4Y = 0;
        ctx.beginPath()
        ctx.moveTo(point1X,point1Y);
        ctx.lineTo(point2X,point2Y);
        ctx.stroke();
        ctx.moveTo(point2X,point2Y);
        ctx.lineTo(point3X,point3Y);
        ctx.stroke();
        ctx.moveTo(point3X,point3Y);
        ctx.lineTo(point1X,point1Y);
        ctx.stroke();
        ctx.closePath();
    }
 
}

function play(ctx){
    voice.pause();
    var x = setInterval(function() {
        time--;
        $('#timer').html(time);
        if (time === 0) {
            score -= 5;
            $('#score').html(score);
            var audio = new Audio("../sources/wrong.mp3");
            audio.play();
            time = 30;
            $('#timer').html(time);
            if (score > 0){
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                generateShape(ctx);
            }
            else {
                score =-1;
                $('#score').html(0);
                clearInterval(x);
                $('#intro').html(`Ooops ! Tu as perdu !<button style="margin-top: 250px;cursor: pointer;font-size:1.5rem;width=250px" id="play" ><a href="Jouer.html">Réessayer !</a> </button>`);
            }

        }
    }, 800);
    $('.options').click(function (){
        if(score!=-1){
        var type = $(this).attr("id");
        if (type == "Rectangle"){
            if (point4X !== 0 && point4Y !== 0){
                var audio = new Audio("../sources/success-sound-effect.mp3");
                audio.play();
                score += 5;
                $('#score').html(score);
                time = 30;
                $('#timer').html(time);
                generateShape(ctx);
            }
            else {
                var audio = new Audio("../sources/wrong.mp3");
                audio.play();
                score -= 5;
                time = 30;
                $('#timer').html(time);
                $('#score').html(score);
                if (score >= 0){
                    generateShape(ctx);
                }
                else {
                    $('#intro').html(`Ooops ! Tu as perdu !<button style="margin-top: 250px;cursor: pointer;font-size: 1.5rem;width=250px" id="play" ><a href="Jouer.html">Réessayer !</a> </button>`);
                    score = -1;
                    $('#score').html(0);
                    clearInterval(x);
                }
            }
        }
        else {
            $.ajax({
                url:'../../Controller/is'+type+'.php?type='+type+'&point1x='+point1X+'&point1y='+point1Y+'&point2x='+point2X+'&point2y='+point2Y+'&point3x='+point3X+'&point3y='+point3Y+'&point4x='+point4X+'&range=80',
                success:function(data){
                    console.log(data);
                    if (data == 1){
                        var audio = new Audio("../sources/success-sound-effect.mp3");
                        audio.play();
                        score += 5;
                        $('#score').html(score);
                        time = 30;
                        $('#timer').html(time);
                        generateShape(ctx);

                    }
                    else if(data == 0){
                        var audio = new Audio("../sources/wrong.mp3");
                        audio.play();
                        score -= 5;
                        time = 30;
                        $('#timer').html(time);
                        $('#score').html(score);
                        if (score >= 0){
                            generateShape(ctx);
                        }
                        else {
                            $('#intro').html(`Ooops ! Tu as perdu !<button style="margin-top: 250px;cursor: pointer;font-size:1.5rem;width=250px" id="play" ><a href="Jouer.html">Réessayer !</a> </button>`);
                            score = -1;
                            $('#score').html(0);
                            clearInterval(x);
                        }
                    }
                },
                error:function(er){
                    console.log(er);
                }
            })
        }
    }
    })
}

