// MODAL VALIDATION FUNCTIONS
// A. Validate name field
$("[name='task_Name']").on("input", function () {
    if ($(this).val().length > 75) {
        $(this).closest(".form-group").find(".invalid-feedback").show();
    } else {
        $(this).closest(".form-group").find(".invalid-feedback").hide();
    }
    validate_form(this);
});

$("[name='task_Desc']").on("input", function () {
    if ($(this).val().length > 16777215) {
        $(this).closest(".form-group").find(".invalid-feedback").show();
    } else {
        $(this).closest(".form-group").find(".invalid-feedback").hide();
    }
    validate_form(this);
});

$("[name='task_Tags']").on("input", function () {
    if (validate_tags($(this).val())) {
        $(this).closest(".form-group").find("small").hide();
        $(this).closest(".form-group").find(".invalid-feedback").show();
    } else {
        $(this).closest(".form-group").find(".invalid-feedback").hide();
        $(this).closest(".form-group").find("small").show();
    }
    validate_form(this);
});

function validate_tags(source) {
    var split = source.split(",");
    if (split.length > 3) {
        return true;
    } else {
        for (let i = 0; i < split.length; i++) {
            if (split[i].length > 12) {
                return true;
            }
        }
        return false;
    }
}

$("[name='task_Due']").on("input", function () {
    if (validate_date(this)) {
        $(this)
            .closest(".task_Date")
            .find(".input-group>.invalid-feedback")
            .show();
    } else {
        $(this)
            .closest(".task_Date")
            .find(".input-group>.invalid-feedback")
            .hide();
    }
});

$("[name='task_Reminder']").on("input", function () {
    if (validate_date(this)) {
        $(this)
            .closest(".task_Date")
            .find(".input-group>.invalid-feedback")
            .show();
    } else {
        $(this)
            .closest(".task_Date")
            .find(".input-group>.invalid-feedback")
            .hide();
    }
});

function validate_date(source) {
    var due = new Date(
        $(source).closest(".task_Date").find("[name='task_Due']").val()
    );
    var reminder = new Date(
        $(source)
            .closest(".task_Date")
            .find("[name='task_Reminder']")
            .val()
            .substr(0, 10)
    );

    return reminder > due;
}

function validate_form(source) {
    if (
        $(source)
            .closest(".modal")
            .find(".form-group>.invalid-feedback")
            .is(":visible")
    ) {
        $(source)
            .closest(".modal")
            .find("[type='submit']")
            .attr("disabled", "");
    } else {
        $(source)
            .closest(".modal")
            .find("[type='submit']")
            .removeAttr("disabled");
    }
}

// MODAL CONVENIENCE FUNCTIONS

// A. Remove due date
$(".remove_due_date").click(function () {
    $(this).closest(".input-group").find("input").val("");
});

// B. Remove reminder
$(".remove_reminder").click(function () {
    $(this).closest(".input-group").find("input").val("");
});

// C. Reset modal form values on cancel
$(".modal").on("hidden.bs.modal", function () {
    $(this).find("form")[0].reset();
    $(this).find(".invalid-feedback").hide();
    $(this).find("[type='submit']").removeAttr("disabled");
});
