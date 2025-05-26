<!-- FULL UPDATED STUDENT CHAT PAGE -->
@include('backend-components.users.head')

<body>
    <div class="d-flex">
        @include('backend-components.users.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend-components.users.header')


            <style>
                /* ───────────  COLOURS & CONSTANTS  ─────────── */
                :root {
                    --bubble-out: #186d8e;
                    --bubble-in: #ffffff;
                    --bubble-text: #ffffff;
                    --accent: #00bfd5;
                    --divider: #d2d2d2;
                    --muted: #6c757d;
                    --background: #ECEAE6;
                    --header-h: 70px;
                }

                /* ───────────  GLOBAL BASE  ─────────── */
                body {
                    background: #f5f5f5;
                }

                /*  full-height wrapper under the page header */
                .chat-wrapper {
                    display: flex;
                    /* row (desktop) */
                    height: calc(100dvh - var(--header-h));
                    /* full viewport minus header */
                    background: var(--background);
                    min-height: 0;
                    /* critical for flexbox shrink */
                }

                /* ───────────  SIDEBAR (contact list)  ─────────── */
                .chat-sidebar {
                    width: 324px;
                    /* desktop width */
                    flex: 0 0 324px;
                    display: flex;
                    flex-direction: column;
                    background: #fff;
                    border-right: 1px solid var(--divider);
                }

                .contact-list {
                    overflow-y: auto;
                    flex: 1 1 auto;
                }

                .contact-row {
                    cursor: pointer;
                    display: flex;
                    gap: .75rem;
                    padding: 1rem 1.25rem;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                    transition: background .2s;
                }

                .contact-row:hover {
                    background: rgba(0, 0, 0, .03);
                }

                .contact-row.active {
                    background: #dff6ff;
                }

                .badge-unread {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    min-width: 20px;
                    height: 20px;
                    padding: 2px 6px;
                    background: var(--accent);
                    color: #fff;
                    font-size: .65rem;
                    border-radius: 50%;
                }

                /* ───────────  CHAT PANE  ─────────── */
                .chat-pane {
                    flex: 1 1 0;
                    /* fill all leftover space */
                    min-width: 0;
                    /* avoid x-scroll          */
                    display: flex;
                    flex-direction: column;
                    background: #fff;
                }

                .contact-header {
                    display: flex;
                    align-items: center;
                    padding: 10px 15px;
                    border-bottom: 1px solid var(--divider);
                }

                /* message list */
                .chat-messages {
                    flex: 1 1 auto;
                    min-height: 0;
                    /* allow vertical shrink   */
                    overflow-y: auto;
                    /* vertical scroll only    */
                    overflow-x: hidden;
                    padding: 20px;
                }

                .date-divider {
                    text-align: center;
                    color: var(--muted);
                    margin: 20px 0;
                    font-size: 14px;
                    position: relative;
                }

                .date-divider:before,
                .date-divider:after {
                    content: "";
                    position: absolute;
                    top: 50%;
                    width: 42%;
                    height: 1px;
                    background: var(--divider);
                }

                .date-divider:before {
                    left: 0;
                }

                .date-divider:after {
                    right: 0;
                }

                .bubble {
                    padding: 12px 15px;
                    border-radius: 14px;
                    font-size: 14px;
                    line-height: 1.45;
                    max-width: 75%;
                    margin-bottom: 8px;
                }

                .bubble-in {
                    background: var(--bubble-in);
                    color: #000;
                    border: 1px solid rgba(0, 0, 0, .1);
                    border-top-left-radius: 0;
                    align-self: flex-start;
                }

                .bubble-out {
                    background: var(--bubble-out);
                    color: var(--bubble-text);
                    border-top-right-radius: 0;
                    align-self: flex-end;
                }

                .bubble-meta {
                    font-size: 12px;
                    margin-top: 4px;
                    text-align: right;
                    opacity: .8;
                }

                .msg-status {
                    font-size: 12px;
                    color: #28a745;
                    text-align: right;
                    margin: 2px 0 12px;
                }

                /* input */
                .chat-input {
                    padding: 15px;
                    border-top: 1px solid var(--divider);
                }

                .input-wrapper {
                    position: relative;
                    border: 1px solid var(--divider);
                    border-radius: 20px;
                    background: #fff;
                    min-height: 110px;
                    display: flex;
                    flex-direction: column;
                }

                .input-wrapper textarea {
                    flex: 1;
                    border: none;
                    resize: none;
                    padding: 15px;
                    background: transparent;
                    font-size: 14px;
                }

                .input-wrapper textarea:focus {
                    outline: none;
                }

                .input-actions {
                    position: absolute;
                    right: 12px;
                    bottom: 12px;
                    display: flex;
                    gap: 10px;
                    align-items: center;
                }

                .action-btn {
                    width: 38px;
                    height: 38px;
                    border: 1px solid var(--divider);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    font-size: 16px;
                    color: #555;
                    transition: background .2s;
                }

                .action-btn:hover {
                    background: #f1f1f1;
                }

                .send-btn {
                    background: var(--accent);
                    color: #fff;
                    font-weight: 600;
                    padding: 8px 25px;
                    border: none;
                    border-radius: 50px;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                }

                /* ───────────  PHONES / TABLETS  ─────────── */
                @media (max-width:991.98px) {
                    .chat-wrapper {
                        flex-direction: column;
                    }

                    .chat-sidebar {
                        width: 100%;
                        flex: auto;
                        max-height: 38vh;
                        /* up to ~38% of screen */
                        border-right: none;
                        border-bottom: 1px solid var(--divider);
                    }

                    .chat-messages {
                        padding: 12px;
                    }
                }

                @media (max-width:767.98px) {
                    .chat-messages {
                        padding: 10px;
                    }

                    .bubble {
                        max-width: 85%;
                    }
                }


                /* ───────────  MESSAGE BUBBLES  ─────────── */

                /* universal bubble width — tighten it up */
                .bubble {
                    max-width: 65%;
                    /* desktop / tablet */
                }

                @media (max-width: 767.98px) {

                    /* phones */
                    .bubble {
                        max-width: 80%;
                    }
                }

                /* incoming = LEFT  (no change, just clearer) */
                .bubble-in {
                    align-self: flex-start;
                    /* ⬅️ keep on the left */
                    text-align: left;
                }

                /* outgoing = RIGHT */
                .bubble-out {
                    align-self: flex-end;
                    /* ➡️ move to the right edge */
                    text-align: left;
                    /* keep text normal           */
                    margin-left: auto;
                    /* make sure the whole block hugs right */
                }

                .clear-btn {
                    position: absolute;
                    top: 50%;
                    right: 1.2rem;
                    transform: translateY(-50%);
                    color: #adb5bd;
                }

                .clear-btn:hover {
                    color: #000;
                }
            </style>

            <style>
                @media (max-width: 576px) {
                    #emoji-picker-container {
                        right: 5%;
                        left: 5%;
                        bottom: 120px;
                    }
                }
            </style>
            <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
            <div class="chat-wrapper p-lg-5 p-md-3">

                <div class="chat-sidebar">
                    <div class="position-relative p-3">
                        <i class="bi bi-search position-absolute"
                            style="top:50%;left:1.4rem;transform:translateY(-50%);color:#adb5bd;"></i>
                        <input id="chatSearch" type="text" class="form-control rounded-pill ps-5 pe-5"
                            placeholder="Search…">

                        <button id="clearSearch" type="button" class="btn btn-link p-0 clear-btn d-none">
                            <i class="bi bi-x-lg"></i>
                        </button>

                    </div>

                    <div class="contact-list"></div>
                </div>

                <div class="chat-pane">

                    <div class="contact-header">
                        <img src="" width="44" height="44" class="rounded-circle me-2" alt="">
                        <div class="fw-bold flex-grow-1"></div>
                        <button class="btn btn-link text-muted p-0 me-2">
                            <i class="bi bi-ban fs-5"></i>
                        </button>
                        <button class="btn btn-link text-muted p-0"><i class="bi bi-trash fs-5"></i></button>
                    </div>

                    <div class="chat-messages"></div>

                    <div class="chat-input">
                        {{-- <div class="input-wrapper">
                            <textarea rows="3" placeholder="Send a message…"></textarea>
                            <div class="input-actions">
                                <input type="file" id="chatFileInput" style="display:none;" accept="image/*">
                                <button class="action-btn" id="attachFileBtn"><i class="bi bi-paperclip"></i></button>
                                <button class="action-btn emoji-btn"><i class="bi bi-emoji-smile"></i></button>
                                <button class="send-btn">Send <i class="bi bi-send-fill"></i></button>
                            </div>
                        </div> --}}

                        <div class="input-wrapper">
                            <!-- File preview container -->
                            <div id="file-preview" style="display: none; position: relative; padding: 10px;">
                                <img id="preview-image" src=""
                                    style="width: 100px; height: 100px; border-radius: 8px;">
                                <button id="cancel-preview"
                                    style="position: absolute; top: 0; right: 0; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; line-height: 18px; font-size: 12px; cursor: pointer;">&times;</button>
                            </div>

                            <textarea rows="3" placeholder="Send a message…"></textarea>
                            <div class="input-actions">
                                <input type="file" id="chatFileInput" style="display:none;" accept="image/*">
                                <button class="action-btn" id="attachFileBtn"><i class="bi bi-paperclip"></i></button>
                                <button class="action-btn emoji-btn"><i class="bi bi-emoji-smile"></i></button>
                                <button class="send-btn">Send <i class="bi bi-send-fill"></i></button>
                            </div>
                        </div>


                    </div>

                    <!-- Emoji Picker (hidden initially) -->
                    <div id="emoji-picker-container"
                        style="position: fixed; bottom: 120px; right: 20px; display: none; z-index: 999; max-width: 90%; max-height: 300px; overflow: auto;">
                        <emoji-picker style="width: 100%;"></emoji-picker>
                    </div>


                </div>

            </div>
        </div>
    </div>

    @include('backend-components.users.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        const search = document.getElementById('chatSearch');
        const clearBtn = document.getElementById('clearSearch');

        // toggle the X icon
        search.addEventListener('input', () => {
            clearBtn.classList.toggle('d-none', search.value === '');
        });

        // clear the field when the X is clicked
        clearBtn.addEventListener('click', () => {
            search.value = '';
            search.dispatchEvent(new Event('input')); // hide the button again
            search.focus();
        });
    </script>


    <script>
        $(document).ready(function() {
            const baseUrl = '{{ url('/') }}';
            const userId = {{ auth()->id() }};

            function escapeHtml(text) {
                return $('<div>').text(text).html();
            }

            function fetchInstructors(query = '') {
                $.ajax({
                    url: "{{ route('user.search.instructors') }}",
                    method: 'GET',
                    data: {
                        q: query
                    },
                    success: function(data) {

                        const $contactList = $('.contact-list');
                        $contactList.empty();

                        if (data.length === 0) {
                            $contactList.append(
                                '<div class="p-3 text-muted">No instructors found.</div>');
                        } else {
                            data.forEach(contact => {
                                const imgSrc = contact.photo ? '{{ asset('') }}' + contact
                                    .photo : '/default-avatar.png';
                                const time = contact.last_message_time ?
                                    new Date(contact.last_message_time).toLocaleTimeString([], {
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: true
                                    }) :
                                    '';
                                const lastMsg = contact.last_message || 'No messages yet';
                                const unreadBadge = contact.unread_count > 0 ?
                                    `<span class="badge-unread">${contact.unread_count}</span>` :
                                    '';

                                const row = `
                                            <div class="contact-row d-flex" data-instructor-id="${contact.id}" data-instructor-name="${contact.name}"
                                            data-instructor-photo="${imgSrc}">
                                                <img src="${imgSrc}" width="48" height="48" class="rounded-circle" alt="">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <div class="fw-semibold">${contact.name}</div>
                                                    <div class="text-muted small text-truncate">${lastMsg}</div>
                                                </div>
                                                <div class="text-end d-flex flex-column align-items-end">
                                                    <div class="small text-muted">${time}</div>
                                                    ${unreadBadge}
                                                </div>
                                            </div>`;
                                $contactList.append(row);
                            });
                        }
                    },

                    error: function(xhr) {
                        console.error('Error fetching instructors:', xhr);
                    }
                });
            }


            function fetchConversation(instructorId) {
                $.ajax({
                    url: `${baseUrl}/user/conversations/${instructorId}`,
                    method: 'GET',
                    success: function(response) {
                        const $chatBox = $('.chat-messages');
                        $chatBox.empty();

                        let lastDate = '';

                        response.messages.forEach(msg => {
                            // const bubbleClass = (msg.sender_id === userId) ? 'bubble-out' :
                            //     'bubble-in';

                            const bubbleClass = (Number(msg.sender_id) === Number(
                                instructorId)) ? 'bubble-out' : 'bubble-in';

                            const safeMessage = escapeHtml(msg.message);
                            const msgDate = new Date(msg.created_at);
                            const time = msgDate.toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            });

                            let content = '';

                            if (msg.file_path) {
                                // const imageUrl = `${baseUrl}${msg.file_path}`;
                                const imageUrl = `${$("#base_url").val()}${msg.file_path}`;
                                content +=
                                    `<img src="${imageUrl}" alt="Uploaded image" style="max-width: 200px; border-radius: 8px; margin-top: 5px;">`;
                            }

                            if (msg.message) {
                                content += `<div>${safeMessage}</div>`;
                            }

                            const msgHtml = `
                                <div class="bubble ${bubbleClass}">
                                    ${content}
                                    <div class="bubble-meta">${time} <i class="bi bi-check2-all ms-1"></i></div>
                                </div>`;

                            $chatBox.append(msgHtml);
                        });


                        $chatBox.scrollTop($chatBox[0].scrollHeight);
                    },
                    error: function(xhr) {
                        console.error('Failed to load conversation:', xhr);
                    }
                });
            }

            $(document).on('click', '.contact-row', function() {
                const instructorId = $(this).data('instructor-id');
                const instructorName = $(this).data('instructor-name');
                const instructorPhoto = $(this).data('instructor-photo');

                $('.contact-header').data('instructor-id', instructorId);
                $('.contact-header img').attr('src', instructorPhoto);
                $('.contact-header .fw-bold').text(instructorName);

                fetchConversation(instructorId);
            });

            $('#attachFileBtn').on('click', function(e) {
                e.preventDefault();
                $('#chatFileInput').click();
            });



            $('.send-btn').on('click', function() {
                const messageText = $('textarea').val().trim();
                const instructorId = $('.contact-header').data('instructor-id');
                const fileInput = $('#chatFileInput')[0].files[0];

                if (!messageText && !fileInput) {
                    alert('Please enter a message or select a file.');
                    return;
                }

                if (!instructorId) {
                    alert('Please select an instructor.');
                    return;
                }

                const formData = new FormData();
                formData.append('message', messageText);
                formData.append('instructor_id', instructorId);
                formData.append('_token', '{{ csrf_token() }}');

                if (fileInput) {
                    formData.append('file', fileInput);
                }

                $.ajax({
                    url: `${baseUrl}/user/send-message`,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const msg = response.data;
                        const date = new Date(msg.created_at);
                        const todayStr = new Date().toDateString();
                        const lastDateDivider = $('.chat-messages .date-divider').last().text();
                        const msgDateStr = date.toDateString();

                        if (lastDateDivider !== msgDateStr && lastDateDivider !== 'Today') {
                            const dividerText = (msgDateStr === todayStr) ? 'Today' : date
                                .toLocaleDateString('en-US', {
                                    day: 'numeric',
                                    month: 'long'
                                });
                            $('.chat-messages').append(
                                `<div class="date-divider">${dividerText}</div>`);
                        }

                        let content = '';
                        if (msg.file_path) {
                            const imageUrl = `${$("#base_url").val()}${msg.file_path}`;
                            content +=
                                `<img src="${imageUrl}" alt="Uploaded image" style="max-width: 200px; border-radius: 8px; margin-top: 5px;">`;
                        }
                        if (msg.message) {
                            content += `<div>${escapeHtml(msg.message)}</div>`;
                        }

                        const time = date.toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        });

                        const msgHtml = `
                            <div class="bubble bubble-out">
                                ${content}
                                <div class="bubble-meta">${time} <i class="bi bi-check2-all ms-1"></i></div>
                            </div>`;

                        $('.chat-messages').append(msgHtml);
                        $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
                        $('textarea').val('');
                        $('#chatFileInput').val(''); // reset file input
                        $('#file-preview').hide(); // 👉 clear preview box
                    },
                    error: function(xhr) {
                        console.error('Failed to send message:', xhr);
                    }
                });
            });


            $('#chatSearch').on('keyup', function() {
                const query = $(this).val();
                $('#clearSearch').toggle(query.length > 0);
                fetchInstructors(query);
            });

            $('#clearSearch').on('click', function() {
                $('#chatSearch').val('');
                $(this).addClass('d-none');
                fetchInstructors('');
            });

            fetchInstructors('');
        });
    </script>


    <script>
        Pusher.logToConsole = true;
        const userId = {{ auth()->id() }};
        const pusher = new Pusher('93e8957bc898481fec5a', {
            cluster: 'ap2',
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        const channel = pusher.subscribe('private-chat.' + userId);
        channel.bind('private.message.sent', function(data) {
            const safeMessage = $('<div>').text(data.message.message).html();
            const filePath = data.message.file_path; // assuming you include this in your event payload
            const time = new Date(data.message.created_at).toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });

            let msgContent = '';

            if (filePath) {
                const imageUrl = `${$("#base_url").val()}${filePath}`;

                msgContent =
                    `<img src="${imageUrl}" alt="Uploaded image" style="max-width: 200px; border-radius: 8px; margin-top: 5px;">`;
            }


            if (safeMessage) {
                msgContent += `<div>${safeMessage}</div>`;
            }

            const msgHtml = `
            <div class="bubble bubble-in">
                ${msgContent}
                <div class="bubble-meta">${time} <i class="bi bi-check2-all ms-1"></i></div>
            </div>`;

            $('.chat-messages').append(msgHtml);
            $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
        });
    </script>


    {{-- //////////// code related to emojis --}}

    <!-- Add the emoji-picker script -->
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js';
    </script>

    <script>
        $(document).ready(function() {
            const emojiBtn = document.querySelector('.emoji-btn');
            const emojiContainer = document.querySelector('#emoji-picker-container');
            const emojiPicker = emojiContainer.querySelector('emoji-picker');
            const textarea = document.querySelector('.chat-input textarea');

            // Toggle the emoji picker on button click
            emojiBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (emojiContainer.style.display === 'none') {
                    emojiContainer.style.display = 'block';
                } else {
                    emojiContainer.style.display = 'none';
                }
            });

            // Insert emoji into textarea when selected
            emojiPicker.addEventListener('emoji-click', event => {
                textarea.value += event.detail.unicode;
                textarea.focus();
            });

            // Optional: Hide emoji picker if clicking outside
            document.addEventListener('click', function(e) {
                if (!emojiContainer.contains(e.target) && !emojiBtn.contains(e.target)) {
                    emojiContainer.style.display = 'none';
                }
            });
        });
    </script>


    {{--  image select and cancel code --}}

    <script>
        // Show image preview on file select
        $('#chatFileInput').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-image').attr('src', e.target.result);
                    $('#file-preview').show();
                };
                reader.readAsDataURL(file);
            }
        });

        // Cancel (remove) the preview
        $('#cancel-preview').on('click', function(e) {
            e.preventDefault();
            $('#chatFileInput').val('');
            $('#file-preview').hide();
        });
    </script>
</body>
