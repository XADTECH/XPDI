
/*  update preview */

/*

$(document).ready(function () {
    $('input[type="file"][id^="video-"]').on('change', function (e) {
        const file = e.target.files[0];
        const lectureId = $(this).attr('id').split('-')[1]; // Extract lecture ID from the input ID
        const videoPreview = document.getElementById(`videoPreview-${lectureId}`); // Get the corresponding video preview element

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                $(this).val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();
            videoPreview.onloadeddata = function () {
                URL.revokeObjectURL(this.src); // Free up memory
            };
        }
    });
});  */

$(document).ready(function () {
    $('input[type="file"][id^="video-"]').on('change', function (e) {
        const file = e.target.files[0];
        const lectureId = $(this).attr('id').split('-')[1]; // Extract lecture ID from the input ID
        const videoPreview = document.getElementById(`videoPreview-${lectureId}`); // Get the corresponding video preview element
        const videoDurationInput = document.getElementById(`videoDuration-${lectureId}`); // Get the hidden input for video duration

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                $(this).val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();
            videoPreview.onloadeddata = function () {
                // Get and set video duration
                const durationInSeconds = Math.round(videoPreview.duration); // Round duration to nearest second
                videoDurationInput.value = durationInSeconds; // Store duration in hidden input

                URL.revokeObjectURL(this.src); // Free up memory
            };
        }
    });
});



/*   Create preview  */

/*

$(document).ready(function () {
    // Attach change event to all video input fields
    $(document).on('change', '[id^=video]', function (e) {
        const input = $(this); // Get the current input
        const file = e.target.files[0];
        const modalId = input.closest('.modal').attr('id'); // Get the modal ID
        const videoPreviewId = `videoPreview-${modalId.split('-')[1]}`; // Extract the ID from the modal and create videoPreview ID
        const videoPreview = document.getElementById(videoPreviewId);

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                input.val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();
            videoPreview.onloadeddata = function () {
                URL.revokeObjectURL(this.src); // Free up memory
            };
        }
    });
});  */



$(document).ready(function () {
    // Attach change event to all video input fields
    $(document).on('change', '[id^=video]', function (e) {
        const input = $(this); // Get the current input
        const file = e.target.files[0];
        const modalId = input.closest('.modal').attr('id'); // Get the modal ID
        const videoPreviewId = `videoPreview-${modalId.split('-')[1]}`; // Extract the ID from the modal and create videoPreview ID
        const videoDurationId = `videoDuration-${modalId.split('-')[1]}`; // Create the ID for the hidden input
        const videoPreview = document.getElementById(videoPreviewId);

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                input.val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();

            videoPreview.onloadedmetadata = function () {
                // Set the video duration in seconds to the hidden input field
                const duration = videoPreview.duration.toFixed(2); // Format to 2 decimal places
                $(`#${videoDurationId}`).val(duration);

                // Free up memory
                URL.revokeObjectURL(videoPreview.src);
            };
        }
    });
});









