@extends('backend.instructor.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-content">
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

        {{-- ############### CHAT UI ############### --}}
        <div class="chat-wrapper p-lg-5 p-md-3">

            {{-- ===== SIDEBAR ===== --}}
            <div class="chat-sidebar">
                {{-- search --}}
                <div class="position-relative p-3">
                    <i class="bi bi-search position-absolute"
                        style="top:50%;left:1.4rem;transform:translateY(-50%);color:#adb5bd;"></i>

                    <!-- extra pe-5 so the text never runs under the X icon -->
                    <input id="chatSearch" type="text" class="form-control rounded-pill ps-5 pe-5" placeholder="Search…">

                    <!-- clear button (hidden until there’s text) -->
                    <button id="clearSearch" type="button" class="btn btn-link p-0 clear-btn d-none">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>


                {{-- contact list --}}
                <div class="contact-list">
                    {{-- sample rows – replace with @foreach --}}
                    <div class="contact-row d-flex">
                        <img src="https://i.pravatar.cc/48?img=5" width="48" height="48" class="rounded-circle"
                            alt="">
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-semibold">Nabeel Javeed</div>
                            <div class="text-muted small text-truncate">If you have any question you can ask …</div>
                        </div>
                        <div class="text-end d-flex flex-column align-items-end">
                            <div class="small text-muted">2 min ago</div>
                            <span class="badge-unread">8</span>
                        </div>
                    </div>

                    <div class="contact-row active d-flex">
                        <img src="https://i.pravatar.cc/48?img=15" width="48" height="48" class="rounded-circle"
                            alt="">
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-semibold">Jerom</div>
                            <div class="text-muted small text-truncate">Hi, I am looking for photographer, are you …
                            </div>
                        </div>
                        <div class="text-end d-flex flex-column align-items-end">
                            <div class="small text-muted">12 min ago</div>
                            <span class="badge-unread">8</span>
                        </div>
                    </div>

                    {{-- …more rows… --}}
                </div>
            </div>

            {{-- ===== CHAT PANE ===== --}}
            <div class="chat-pane">

                {{-- header --}}
                <div class="contact-header">
                    <img src="https://i.pravatar.cc/44?img=15" width="44" height="44" class="rounded-circle me-2"
                        alt="">
                    <div class="fw-bold flex-grow-1">Azunyan U. Wu</div>
                    <button class="btn btn-link text-muted p-0 me-5">
                        <i class="bi bi-ban fs-5"></i>
                    </button>
                    <button class="btn btn-link text-muted p-0"><i class="bi bi-trash fs-5"></i></button>
                </div>

                {{-- messages --}}
                <div class="chat-messages">
                    <div class="date-divider">19 August</div>

                    <div class="bubble bubble-in">
                        Hello Sir, how you doing? I need your help
                        <div class="bubble-meta">10:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod…
                        <div class="bubble-meta">11:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="msg-status"><i class="bi bi-check2-all me-1"></i>Sent</div>

                    <div class="date-divider">Today</div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-in">
                        lorem ipsum dolor sit amet
                        <div class="bubble-meta">12:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>

                    <div class="bubble bubble-out">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit…
                        <div class="bubble-meta">13:25 <i class="bi bi-check2-all ms-1"></i></div>
                    </div>
                    <div class="msg-status"><i class="bi bi-check2-all me-1"></i>Sent</div>
                </div>

                {{-- input --}}
                <div class="chat-input">
                    <div class="input-wrapper">
                        <textarea rows="3" placeholder="Send a message…"></textarea>
                        <div class="input-actions">
                            <button class="action-btn"><i class="bi bi-paperclip"></i></button>
                            <button class="action-btn"><i class="bi bi-emoji-smile"></i></button>
                            <button class="send-btn">Send <i class="bi bi-send-fill"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
