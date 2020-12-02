/**
 * notification.php engine
 * @author Janley Molina
 */

/**
 * Spawn a notification/alarm via GET value
 */
function spawnNotification() {
    var GET = window.location.search
        .substr(1)
        .split("&")
        .reduce(
            (o, i) => (
                (u = decodeURIComponent),
                ([k, v] = i.split("=")),
                (o[u(k)] = v && u(v)),
                o
            ),
            {}
        );

    spawnNotificationBase(GET["status_heading"], GET["status"], GET["type"], 0);
}

/**
 * Spawn a custom notification
 * @param status_heading a string containing the heading of the notification, preferably the feature name (shown in boldface)
 * @param status a string containing the notification message
 * @param type either "notif" or "alarm"
 */

function spawnNotificationBase(status_heading, status, type, delay) {
    if (status === undefined) return;

    if (status.length) {
        var toast = $(".toast-template").clone();
        toast.removeClass("toast-template");
        toast.prop("hidden", false);
        toast.find(".toast-header>.toast-title").text(status_heading);
        toast.find(".toast-body").text(status);
        toast.find(".close_notification").click(function () {
            toast.toast("hide");
        });

        var sound;

        if (type === "notif") {
            sound = new Audio("../resources/notification.ogg");
        } else if (type === "alarm") {
            sound = new Audio("../resources/alarm.ogg");
        }

        setTimeout(function () {
            toast
                .find(".toast-header>.toast-time>.text-muted")
                .text(moment().fromNow());
            $("#notification").append(toast);
            toast.toast("show");

            if (type === "notif") {
                setTimeout(function () {
                    toast.toast("hide");
                }, 4500);
            } else if (type === "alarm") {
                setTimeout(function () {
                    toast.toast("hide");
                }, 60000);
            }

            toast.on("hidden.bs.toast", function () {
                toast.remove();
            });

            sound.play();

            if (window.history.replaceState) {
                window.history.replaceState(
                    null,
                    "",
                    window.location.href.split(/[?#]/)[0]
                );
            }
        }, delay);
    }
}
