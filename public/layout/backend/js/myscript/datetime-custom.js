Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}
$(document).ready(function () {
    var start_date = formatDate($("[name='start_date']").val()) ;
    var end_date = formatDate($("[name='end_date']").val());
    var today = new Date();
    dayBetween(start_date,end_date);
    if (start_date <= today) {
        $("[name='start_date']").prop("readonly",true);

        $('#end_date').datetimepicker({
            format:'YYYY-MM-DD',
            useCurrent: false,
            minDate : start_date.addDays(7),
            // disabledDates: [start_date.addDays(7)]
        });

        $("#end_date").on("dp.change", function (e) {
            end_date = new Date(e.date);
            dif = dayBetween(start_date,end_date);
            loadPrice();
        });

    }else{
        $('#start_date').datetimepicker({
            format:'YYYY-MM-DD',
            minDate: today,
            disabledDates: [today],
        });

        $('#end_date').datetimepicker({
            format:'YYYY-MM-DD',
            useCurrent: false,
            minDate : start_date.addDays(7),
            // disabledDates: [start_date.addDays(7)],
            "defaultDate" : start_date.addDays(7)
        });

        $("#start_date").on("dp.change", function (e) {
            start_date = formatDate($("[name='start_date']").val());
            $('#end_date').data("DateTimePicker").minDate(start_date.addDays(7));
            if ((start_date >= end_date) || dayBetween(start_date,end_date) < 7 ) {
                $('#end_date').data("DateTimePicker").clear();
            }
            dayBetween(start_date,end_date);
            loadPrice();
        });

        $("#end_date").on("dp.change", function (e) {
            start_date = formatDate($("[name='end_date']").val())
            dayBetween(start_date,end_date);
            loadPrice();
        });
    }
});

function dayBetween(date1, date2){
    if (date1 <= date2) {
        $("#day-between").html(Math.round((date2-date1) / (1000 * 60 * 60 * 24)) + " ngày");
        $(".diff-date").val(Math.round((date2-date1) / (1000 * 60 * 60 * 24)));
        return Math.round((date2-date1)/(1000 * 60 * 60 * 24));
    }else{
        $("#day-between").html(0 + " ngày");
        return 0;
    }
}

function formatDate(str) {
    var date = str.split('-');
    return new Date(date[0], date[1]-1, date[2]);
}


