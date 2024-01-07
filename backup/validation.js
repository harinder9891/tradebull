$(".number-tab-steps").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: { finish: "Submit" },
    onFinished: function (e, t) {
        alert("Form submitted.");
    },
}),
    $(".icons-tab-steps").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: { finish: "Submit" },
        onFinished: function (e, t) {
            alert("Form submitted.");
        },
    }),
    $(".vertical-tab-steps").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: { finish: "Submit" },
        onFinished: function (e, t) {
            alert("Form submitted.");
        },
    });
var form = $(".steps-validation").show();
$(".steps-validation").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: { finish: "Submit" },
    onStepChanging: function (e, t, i) {
        return (
            i < t ||
            (!(3 === i && Number($("#age-2").val()) < 18) &&
                (t < i && (form.find(".body:eq(" + i + ") label.error").remove(), form.find(".body:eq(" + i + ") .error").removeClass("error")), (form.validate().settings.ignore = ":disabled,:hidden"), form.valid()))
        );
    },
    onFinishing: function (e, t) {
        return (form.validate().settings.ignore = ":disabled"), form.valid();
    },
    onFinished: function (e, t) {
        alert("Submitted!");
    },
}),
    $(".steps-validation").validate({
        ignore: "input[type=hidden]",
        errorClass: "danger",
        successClass: "success",
        highlight: function (e, t) {
            $(e).removeClass(t);
        },
        unhighlight: function (e, t) {
            $(e).removeClass(t);
        },
        errorPlacement: function (e, t) {
            e.insertAfter(t);
        },
        rules: { email: { email: !0 } },
    }),
    $(".datetime").daterangepicker({ timePicker: !0, timePickerIncrement: 30, locale: { format: "MM/DD/YYYY h:mm A" } });
