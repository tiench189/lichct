var globalTriggeringElement;
var globalAdditionalFunction = function () {
    null;
};

var getDateFromISOWeek = function (ywString, separator) {
    try {
        //console.log(ywString);
        var ywArray = ywString.split(separator);
        var y = ywArray[0];
        var w = ywArray[1];
        var simple = new Date(y, 0, 1 + (w - 1) * 7);
        var dow = simple.getDay();
        var ISOweekStart = simple;
        if (dow <= 4)
            ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
        else
            ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());
        return ISOweekStart;
    } catch (err) {
        console.error("Cannot convert Week into date");
        return new Date();
    }
};

var showWeekCalendar = function (triggeringElement, additionalFunction) {
    globalTriggeringElement = triggeringElement;
    globalAdditionalFunction = additionalFunction;
    var prevItem = $(triggeringElement).prev();
    var weekValue = prevItem.val();
    prevItem.datepicker("option", "defaultDate", getDateFromISOWeek(weekValue, '-'));
    prevItem.val(weekValue);
    prevItem.datepicker("show");
};

var setWeekCalendar = function (settingElement) {
    var startDate;
    var endDate;
    var selectCurrentWeek = function () {
        window.setTimeout(function () {
            var activeElement = $("#ui-datepicker-div .ui-state-active");
            var tdElement = activeElement.parent();
            var trElement = tdElement.parent();

            trElement.find("a").addClass("ui-state-active")

        }, 1);
    };

    $(settingElement).datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showWeek: true,
        firstDay: 1,
        onSelect: function (dateText, inst) {
            var datepickerValue = $(this).datepicker('getDate');
            var dateObj = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate());
            var weekNum = $.datepicker.iso8601Week(dateObj);
            if (weekNum < 10) {
                weekNum = "0" + weekNum;
            }
            var ywString = /*datepickerValue.getFullYear() + '-' + */weekNum;
            $(this).val(ywString);
            $(this).prev().html(ywString);

            var dateMinus = datepickerValue.getDay() == 0 ? 7 : 0;
            console.log(datepickerValue.getDate() + ":" + datepickerValue.getDay());

            startDate = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate() - datepickerValue.getDay() + 1 - dateMinus);
            endDate = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate() - datepickerValue.getDay() + 7 - dateMinus);
            $("#start-week").html(formatDate(startDate));
            $("#end-week").html(formatDate(endDate));

            //change date in table
            for (i = 2; i <= 8; i++) {
                var date = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate() - datepickerValue.getDay() + (i - dateMinus - 1));
                $("#d_" + i).html(formatDate(date));
                $("#i_" + i).val(formatDate(date));
            }

            selectCurrentWeek();
            $(this).data('datepicker').inline = true;
            globalAdditionalFunction(globalTriggeringElement);
        },
        onClose: function () {
            $(this).data('datepicker').inline = false;
        },
        beforeShow: function () {
            selectCurrentWeek();
        },
        beforeShowDay: function (datepickerValue) {
            var cssClass = '';
            if (datepickerValue >= startDate && datepickerValue <= endDate)
                cssClass = 'ui-datepicker-current-day';
            selectCurrentWeek();
            return [true, cssClass];
        },
        onChangeMonthYear: function (year, month, inst) {
            selectCurrentWeek();
        }
    }).datepicker('widget').addClass('ui-weekpicker');

    $('body').on('mousemove', '.ui-weekpicker .ui-datepicker-calendar tr', function () {
        $(this).find('td a').addClass('ui-state-hover');
    });
    $('body').on('mouseleave', '.ui-weekpicker .ui-datepicker-calendar tr', function () {
        $(this).find('td a').removeClass('ui-state-hover');
    });

    // function for doing something more

};

var convertToWeekPicker = function (targetElement) {
    if (targetElement.prop("tagName") == "INPUT" && (targetElement.attr("type") == "text" || targetElement.attr("type") == "hidden")) {
        var week = targetElement.val();
        $('<span class="displayDate" style="display:none">' + week + '</span>').insertBefore(targetElement);
        $('<i class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;" onclick="javascript:showWeekCalendar(this)"></i>').insertAfter(targetElement);
        setWeekCalendar(targetElement);
    } else {
        targetElement.replaceWith("<span>ERROR: please control js console</span>");
        console.error("convertToWeekPicker() - ERROR: The target element is not compatible with this conversion, try to use an <input type=\"text\" /> or an <input type=\"hidden\" />");
    }
};

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [day, month, year].join('/');
}