$(document).ready(function () {
    getPollQuestion();
});

function getPollQuestion() {
    //event.preventDefault();

    $.ajax({
       type:'GET',
       url:websiteRoot+'/poll',
       success:function (podaci) {
            console.log(podaci['podaci']);

            $('#pollQuestion').html(podaci['podaci'][0].question);
            var ispis="";
            ispis+="<input type='hidden' name='idQuestion' id='idQuestion' value='"+podaci['podaci'][0].id_poll+"'/>"
           for(var i=0; i < podaci['podaci'].length; i++){
               ispis+="<li class='list-group-item'><div class='radio'>";
               ispis+="<label>";
               ispis+="<input type='radio' name='radioPollOption' class='pollRadio' id='radio' value='"+podaci['podaci'][i].id+"'/>";
               ispis+=  podaci['podaci'][i].answer ;
               ispis+="</label>";
               ispis+="<span id='count2' class='spanCountVotes'>" + podaci['podaci'][i].votes + "</span>";
               ispis+="</div>";
               ispis+="</li>";
           }

           $('#pollOptions').html(ispis);
       },
        error:function (greske) {
            console.log(greske);
        }
    });
}

function pollVote() {
    //event.preventDefault();

    var idQuestion=$('#idQuestion').val();
    var idAnswer;
    var ipAddress;
    $( ".radio .pollRadio" ).each(function() {
        if($(this).is(':checked')) {
            idAnswer=$(this).val();
        }
    });
    $.getJSON("http://jsonip.com/?callback=?", function (data) {
        ipAddress=data.ip;
        $.ajax({
            type:'GET',
            url:websiteRoot+'/poll_vote/'+idQuestion+'/'+idAnswer+'/'+ipAddress,
            success:function (podaci) {
                console.log(podaci);
                $('#status').addClass(podaci['podaci'].color);
                $('#status').html(podaci['podaci'].text);
                getPollQuestion();
            },
            error:function (greske) {
                console.log(greske);
            }
        });
    });
}