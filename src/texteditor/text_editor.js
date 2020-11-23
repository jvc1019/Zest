/**
 * Simple Text Editor
 * @author Janley Molina
 * @license https://opensource.org/licenses/CDDL-1.0
 */

function getHTML(source) {
    return $(source).closest(".form-group").find(".editor_textarea").html();
}

function setHTML(source, value) {
    $(source).closest(".form-group").find(".editor_textarea").html(value);
}

function getText(source) {
    return $(source).closest(".form-group").find(".editor_textarea").text();
}

function setText(source, value) {
    $(source).closest(".form-group").find(".editor_textarea").text(value);
}

function pushCurrentState(source) {
    var value = getHTML(source);

    $(source).closest(".form-group").find("[name='note_Content']").val(value);
}

$(".editor_bold").click(function () {
    document.execCommand("bold");

    pushCurrentState(this);
});

$(".editor_italicize").click(function () {
    document.execCommand("italic");

    pushCurrentState(this);
});

$(".editor_underline").click(function () {
    document.execCommand("underline");

    pushCurrentState(this);
});

$(".editor_strikethrough").click(function () {
    document.execCommand("strikeThrough");

    pushCurrentState(this);
});

$(".editor_font").change(function () {
    document.execCommand("fontName", false, $(this).val());

    pushCurrentState(this);
});

$(".editor_fontSize").change(function () {
    document.execCommand("fontSize", false, "7");
    $(this)
        .closest(".form-group")
        .find(".editor_fontSize_indicator")
        .text($(this).val());
    var fontElements = window.getSelection().anchorNode.parentNode;
    fontElements.removeAttribute("size");
    fontElements.style.fontSize = $(this).val() + "pt";

    pushCurrentState(this);
});

$(".editor_bullet").click(function () {
    document.execCommand("insertUnorderedList");

    pushCurrentState(this);
});

$(".editor_number").click(function () {
    document.execCommand("insertOrderedList");

    pushCurrentState(this);
});

$(".editor_rem").click(function () {
    document.execCommand("removeFormat");

    pushCurrentState(this);
});

$(".editor_textarea").on("input", function () {
    var HTML = getHTML(this);
    var text = getText(this);

    if (!(text.length > 0) && !HTML.includes("<li>")) {
        setHTML(this, "");
    }

    findCurrentTags(this);
    pushCurrentState(this);
});

$(".editor_textarea").click(function () {
    findCurrentTags(this);
});

<<<<<<< HEAD
$(".editor_textarea").focusin(function () {
    findCurrentTags(this);
});

$(".editor_textarea").focusout(function () {
    findCurrentTags(this);
});

=======
>>>>>>> 7109225... Replaced CKeditor with custom-made text editor on:
$(".editor_textarea").on("dragstart", function (e) {
    e.preventDefault();
});

$(".editor_textarea").on("paste", function (e) {
    e.preventDefault();
    const text = (e.originalEvent || e).clipboardData.getData("text/plain");
    document.execCommand("insertText", false, text);

    pushCurrentState(this);
});

function findCurrentTags(source) {
    var selection = window.getSelection();

    var start_element = selection.getRangeAt(0).startContainer;
    var end_element = selection.getRangeAt(0).endContainer;

    var range_parent_tags = [];

    if (start_element.isEqualNode(end_element)) {
        var cur_element = start_element.parentNode;

        while (!source.isEqualNode(cur_element)) {
            range_parent_tags.push(cur_element.nodeName);
            cur_element = cur_element.parentNode;
        }
    }

    if (range_parent_tags.indexOf("B") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_bold")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_bold")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }

    if (range_parent_tags.indexOf("I") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_italicize")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_italicize")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }

    if (range_parent_tags.indexOf("U") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_underline")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_underline")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }

    if (range_parent_tags.indexOf("STRIKE") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_strikethrough")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_strikethrough")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }

    if (range_parent_tags.indexOf("UL") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_bullet")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_bullet")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }

    if (range_parent_tags.indexOf("OL") != -1) {
        $(source)
            .closest(".form-group")
            .find(".editor_number")
            .addClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    } else {
        $(source)
            .closest(".form-group")
            .find(".editor_number")
            .removeClass(
                "border-primary border-top-0 border-left-0 border-right-0 text-primary"
            );
    }
}
