function initWheel(data) {
    var wheelSpinning = false;
    // Create image in memory.
    // Create new wheel object specifying the parameters at creation time.
    var theWheel = new Winwheel({
        //'drawMode': 'segmentImage',
        'canvasId': 'canvas',
        'numSegments': data.length, // Specify number of segments.
        'outerRadius': 200, // Set outer radius so wheel fits inside the background.  // Set font size as desired.
        'drawMode': 'segmentImage',
        //'imageDirection': 'S',
        'segments': data, // Define segments including colour and text.
        'animation': // Specify the animation to use.
        {
            'type': 'spinToStop',
            'duration': 7, // Duration in seconds.
            'spins': 8, // Number of complete spins.
            'clearTheCanvas': false,
            'callbackFinished': function() {
                // Get the segment indicated by the pointer on the wheel background which is at 0 degrees.
                var winningSegment = theWheel.getIndicatedSegment();
                $.ajax({
                    url: '/html/save/' + winningSegment.id,
                    async: false,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.message) {
                            if (data.info) {
                                message = data.info;
                            } else {
                                message = data.message;
                            }
                            swal({
                                title: "Thông tin phần thưởng",
                                type: "success",
                                html: true,
                                text: message
                            });
                        }
                        if (data.point) {
                            $('#point').html(data.point);
                        }
                    },
                    error: function(data) {
                        swal({
                            title: "Lỗi",
                            type: "error",
                            text: "Có lỗi xảy ra vui lòng thử lại"
                        }, function() {
                            window.location.reload();
                        });
                    }
                });
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                theWheel.stopAnimation(false); // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0; // Re-set the wheel angle to 0 degrees.
                theWheel.draw();
                wheelSpinning = false;
                $("#flat-slider").slider("enable");
            }
        }
    });
    // Vars used by the code in this page to do power controls.
    // Create image in memory.
    // -------------------------------------------------------
    // Function to handle the onClick on the power buttons.
    // -------------------------------------------------------
    // -------------------------------------------------------
    // Click handler for spin button.
    // -------------------------------------------------------
    function startSpin(e, power) {
        // Ensure that spinning can't be clicked again while already running.
        if (wheelSpinning === false) {
            // Based on the power level selected adjust the number of spins for the wheel, the more times is has
            // to rotate with the duration of the animation the quicker the wheel spins.
            theWheel.animation.spins = power;
            // Disable the spin button so can't click again while wheel is spinning.
            //document.getElementById('spin_button').src = "spin_off.png";
            //document.getElementById('spin_button').className = "";
            // Begin the spin animation by calling startAnimation on the wheel object.
            if (e) {
                var stopAt = theWheel.getRandomForSegment(e);
                theWheel.animation.stopAngle = stopAt;
                theWheel.startAnimation();
            }
            // Set to true so that power can't be changed and spin button re-enabled during
            // the current animation. The user will have to reset before spinning again.
            wheelSpinning = true;
        }
    }
    // -------------------------------------------------------
    // Function for reset button.
    // -------------------------------------------------------
    // -------------------------------------------------------
    // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
    // -------------------------------------------------------
    $('#flat-slider').slider({
        orientation: 'vertical',
        range: false,
        value: 19,
        max: 20,
        animate: "fast",
        slide: function(event, ui) {},
        stop: function(event, ui) {
            $.ajax({
                url: '/html/random',
                async: false,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.message) {
                        swal({
                            title: "Có lỗi xảy ra",
                            type: "error",
                            text: data.message
                        }, function() {
                            window.location = data.link;
                        });
                    } else {
                        $("#flat-slider").slider("disable");
                        data = parseInt(data)
                        startSpin(data, (20 - ui.value));
                        $("#flat-slider").slider("value", 19);
                    }
                }
            });
        }
    });
}
$.get('/html/load', function(data) {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        window.location.href = '/';
    } else {
        initWheel(data);
    }
}, 'json');