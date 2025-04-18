@extends('backend.instructor.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-content">
        <div class="chat-wrapper">
            <div class="chat-sidebar">
                <div class="chat-sidebar-header">
                    <div class="d-flex align-items-center">
                        <div class="chat-user-online">
                            <img src="{{ asset(auth()->user()->photo) }}" width="45" height="45" class="rounded-circle"
                                alt="" />
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="dropdown">
                            <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret"
                                data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i
                                class='bx bx-search'></i></span>
                        <input type="text" class="form-control" placeholder="People, groups, & messages">
                        <span class="input-group-text bg-transparent"><i class='bx bx-dialpad'></i></span>
                    </div>

                </div>
                <div class="chat-sidebar-content">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-Chats">

                            <div class="chat-list">

                                <!----all student list---->

                                @foreach ($unique_students as $item)
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:;" class="list-group-item instructor-card"
                                            data-photo="{{ asset($item->user->photo) }}" data-id={{ $item->user->id }}
                                            data-name="{{ $item->user->name }}">

                                            <div class="d-flex">
                                                <div class="chat-user-online">
                                                    <img src="{{ asset($item->user->photo) }}" width="42" height="42"
                                                        class="rounded-circle" alt="" />
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-0 chat-title mt-3" style="margin-left: 5px">
                                                        {{ $item->user->name }}</h6>

                                                </div>

                                            </div>
                                        </a>


                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-header d-flex align-items-center">
                <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
                </div>
                <div class="">
                    <div class="" style="display: flex; align-items:center; justify-content: flex-start; gap: 10px;">
                        <img src="{{ asset(auth()->user()->photo) }}" id="user-photo" width="60" height="60"
                            style="border-radius: 30px; border: 3px solid blue; padding: 10px" />
                        <span class=" font-weight-bold" style="font-weight:bold"
                            id="user-name">{{ auth()->user()->name }}</span>

                    </div>


                </div>
                <div class="chat-top-header-menu ms-auto"> <a href="javascript:;"><i class='bx bx-video'></i></a>
                    <a href="javascript:;"><i class='bx bx-phone'></i></a>
                    <a href="javascript:;"><i class='bx bx-user-plus'></i></a>
                </div>
            </div>


            <div class="chat-content" id="chat-box">

                <!----Jquery Append here--->




            </div>

            <form id="chat-form">

                @csrf

                <div class="chat-footer d-flex align-items-center message-reply-body" style="display: none !important">


                    <div class="flex-grow-1 pe-2">
                        <div class="input-group"> <span class="input-group-text"><i class='bx bx-smile'></i></span>


                            <input type="text" id="message" name="message" class="form-control"
                                placeholder="Type a message" required>



                        </div>
                    </div>
                    <div class="chat-footer-menu">
                        <button type="button" id="send-message" class="btn btn-dark btn sm">Submit</button>

                    </div>

                </div>
                <!--start chat overlay-->

            </form>

            <div class="overlay chat-toggle-btn-mobile"></div>
            <!--end chat overlay-->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Day.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.7/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.7/plugin/relativeTime.js"></script>

    <script>
        $(document).ready(function() {

            // Pusher integration
            Pusher.logToConsole = true;
            var pusher = new Pusher('dc84415d6dac7139fa0e', {
                cluster: 'ap2'
            });
            var channel = pusher.subscribe('my-channel');

            // Delegate click event for dynamically loaded instructor cards
            $(document).on('click', '.instructor-card', function(e) {

                e.preventDefault();
                $('.message-reply-body').show();

                const photo = $(this).data('photo');
                const name = $(this).data('name');
                const user_id = $(this).data('id');




                $('#user-photo').attr('src', photo);
                $('#user-name').text(name);
                $('#chat-box').empty();

                $('#chat-form').on('keydown', function(e) {
                    // If the Enter key (key code 13) is pressed
                    if (e.keyCode === 13) {
                        e.preventDefault(); // Prevent the form from submitting
                        $('#send-message').click(); // Trigger the click event manually
                    }
                });

                // Attach new click event listener


                // Extending dayjs with relativeTime plugin
                dayjs.extend(dayjs_plugin_relativeTime);


                // Fetch messages via AJAX
                $.ajax({
                    url: '/instructor/user/messages',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        user_id: user_id
                    },
                    success: function(response) {

                        $('#chat-box').empty();
                        response.forEach(function(message) {
                            // Convert created_at to relative time using dayjs
                            const userMessageTime = dayjs(message.created_at).fromNow();
                            const userMessageHtml = `

                             <div class="chat-content-leftside">
                                <div class="d-flex">
                                    <img src="${message.user.photo}" width="48" height="48" class="rounded-circle" alt="" />
                                   <div class="flex-grow-1 ms-2">
                                      <p class="mb-0 chat-time">${userMessageTime}</p>
                                      <p class="chat-left-msg">${message.message}</p>

                                    </div>
                                </div>
                             </div>

                            `;
                            $('#chat-box').append(userMessageHtml);

                            message.instructor_message.forEach(function(
                                instructorMessage) {
                                const instructorMessageHtml = `

                                 <div class="chat-content-rightside">
                                    <div class="d-flex">

                                         <div class="flex-grow-1 me-2">
                                            <p class="mb-0 chat-time text-end">
                                                <img src="${instructorMessage.instructor.photo}" width="48" height="48" class="rounded-circle" alt="" />
                                                <br>
                                                <span>${userMessageTime}</span>

                                            </p>
                                            <p class="chat-right-msg">
                                                ${instructorMessage.message}

                                            </p>


                                         </div>


                                    </div>
                                 </div>
                                `;
                                $('#chat-box').append(instructorMessageHtml);
                            });


                        });


                    },
                    error: function(error) {
                        console.error("Something went wrong:", error);
                    }
                });


            })


            // Pusher event
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));
                const chatBox = $('#chat-box');

                // Determine class based on sender
                const chatSideClass = data.sender === 'instructor' ? 'chat-content-leftside' :
                    'chat-content-rightside';
                const imageSide = data.sender === 'instructor' ? '' : 'text-end';

                const messageType = data.sender === 'instructor' ? 'chat-left-msg' : 'chat-right-msg'

                const messageHtml =
                    `
                    <div class="${chatSideClass}">
                                    <div class="d-flex">

                                         <div class="flex-grow-1 me-2">
                                            <p class="mb-0 chat-time ${imageSide}">
                                                <img src="${data.avatar}" width="48" height="48" class="rounded-circle" alt="" />
                                                <br>
                                                <span>${data.time}</span>

                                            </p>
                                            <p class="${messageType}">
                                                ${data.message}

                                            </p>


                                         </div>


                                    </div>
                                 </div>

                 `;
                chatBox.append(messageHtml);
                chatBox.scrollTop(chatBox[0].scrollHeight);


            });

        })
    </script>

    <script>
        $(document).on('click', '.instructor-card', function(e) {

            const user_id = $(this).data('id');

            $('#send-message').on('click', function(e) {

                e.preventDefault();


                const messageInput = $('#message');
                const message = messageInput.val();

                if (message.trim() === '') return;

                axios.post('/instructor/send-message', {
                        message: message,
                        user_id: user_id,
                        _token: "{{ csrf_token() }}"
                    })
                    .then(response => {


                        console.log(response.data);
                        // Correct way to clear the value of an input field


                    })
                    .catch(error => {
                        console.error(error);
                    });
            });

        })
    </script>
@endpush
