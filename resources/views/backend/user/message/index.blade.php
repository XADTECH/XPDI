@extends('backend.user.master')

@section('content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Message</h3>
    </div>
    <div class="dashboard-message-wrapper d-flex my-4">

        <div class="message-sidebar">
            <form action="#" class="p-4">
                <div class="form-group mb-0">
                    <input id="search-instructor" class="form-control form--control form--control-gray pl-3" type="text"
                        placeholder="Search...">
                    <button type="submit" class="search-icon"><i class="la la-search"></i></button>
                </div>
            </form>
            <div class="message-inbox-item border-bottom border-bottom-gray">
                <div class="notification-body scrolled-box scrolled--box custom-scrollbar-styled">


                    <!-- Instructor List -->
                    @foreach ($uniqueInstructors as $index => $data)
                        <a href="#"
                            class="media media-card align-items-center instructor-card {{ $index == 0 ? 'message-active' : '' }}"
                            data-photo="{{ asset($data->instructor->photo) }}" data-id={{ $data->instructor->id }}
                            data-name="{{ $data->instructor->name }}">
                            <div class="avatar-sm flex-shrink-0 mr-2 position-relative">
                                <img class="rounded-full img-fluid" src="{{ asset($data->instructor->photo) }}"
                                    alt="Instructor image">

                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="fs-14">{{ $data->instructor->name }}</h5>

                                <span class="fs-12 d-block lh-18 pt-1 text-gray">

                                    @if ($data->instructor->isOnline())
                                        <span>Online</span>
                                    @else
                                        <small>{{ $data->instructor->lastLoginDiff() }}</small>
                                    @endif

                                </span>

                            </div>
                        </a>
                    @endforeach



                </div>
            </div><!-- end message-inbox-item -->
        </div><!-- message-sidebar -->






        <div class="message-content flex-grow-1">
            <div
                class="message-header bg-gray d-flex align-items-center justify-content-between p-4 border-bottom border-bottom-gray">

                <!-- User Profile Section -->
                <div class="media media-card align-items-center" id="user-profile">
                    <div class="avatar-sm flex-shrink-0 mr-2">
                        <img class="rounded-full img-fluid" id="user-photo" src="{{ asset(auth()->user()->photo) }}"
                            alt="Avatar image">
                    </div>
                    <div class="media-body overflow-hidden">
                        <h5 class="fs-14" id="user-name">{{ auth()->user()->name }}</h5>
                    </div>
                </div>




                <div class="icon-element icon-element-sm shadow-sm cursor-pointer delete-icon" data-toggle="tooltip"
                    data-placement="top" title="Clear chart">
                    <i class="la la-trash"></i>
                </div>

            </div><!-- message-header -->




            <div class="conversation-wrap">
                <div class="conversation-box custom-scrollbar-styled" id="chat-box">

                    <!-----Append howar jaiga--->

                </div><!-- conversation-box -->
            </div><!-- conversation-wrap -->

            <div class="message-reply-body d-flex align-items-center pt-2 px-4 border-top border-top-gray"
                style="display: none !important">
                <form id="chat-form" class="flex-grow-1" autocomplete="off">
                    @csrf
                    <textarea class="emoji-picker" id="message" name="message" placeholder="Your message" rows="3"></textarea>
                    <!-- Hidden field to store instructor ID -->
                    <input type="hidden" id="instructor_id" name="instructor_id" value="">




                </form>


                <button type="button" id="send-message"
                    class="message-send icon-element icon-element-xs bg-1 text-white ml-2 border-0">
                    <i class="la la-paper-plane"></i>
                </button>



            </div>







        </div><!-- message-content -->





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

                $('.message-reply-body').show();




                // Extending dayjs with relativeTime plugin
                dayjs.extend(dayjs_plugin_relativeTime);
                e.preventDefault();

                const photo = $(this).data('photo');
                const name = $(this).data('name');
                const instructor_id = $(this).data('id');



                $('#user-photo').attr('src', photo);
                $('#user-name').text(name);
                $('#chat-box').empty();

                // Clear previous event listener for send-message
                // $('#send-message').off('click');


                // Attach new click event listener


                // Fetch messages via AJAX
                $.ajax({
                    url: '/user/instructor/messages',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        instructor_id: instructor_id
                    },
                    success: function(response) {

                        $('#chat-box').empty();
                        response.forEach(function(message) {
                            // Convert created_at to relative time using dayjs
                            const userMessageTime = dayjs(message.created_at).fromNow();
                            const userMessageHtml = `
                        <div class="conversation-item message-replay mb-3">
                            <div class="media align-items-center">
                                <div class="avatar-sm flex-shrink-0 mr-4">
                                    <img class="rounded-full img-fluid" src="${message.user.photo}" alt="${message.user.name}">
                                </div>
                                <div class="media-body">
                                    <div class="message-body">
                                        <h5 class="fs-13">${message.message}</h5>
                                        <span class="fs-12 d-block lh-18 pt-1">${userMessageTime}</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                            $('#chat-box').append(userMessageHtml);

                            message.instructor_message.forEach(function(
                                instructorMessage) {
                                const instructorMessageHtml = `
                            <div class="conversation-item message-sent mb-3">
                                <div class="media align-items-center">
                                    <div class="avatar-sm flex-shrink-0 mr-4">
                                        <img class="rounded-full img-fluid" src="${instructorMessage.instructor.photo}" alt="${instructorMessage.instructor.name}">
                                    </div>
                                    <div class="media-body">
                                        <div class="message-body">
                                            <h5 class="fs-13">${instructorMessage.message}</h5>
                                            <span class="fs-12 d-block lh-18 pt-1">${userMessageTime}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                                $('#chat-box').append(instructorMessageHtml);
                            });
                        });
                    },
                    error: function(error) {
                        console.error("Something went wrong:", error);
                    }
                });

            });



            // Pusher event
            channel.bind('my-event', function(data) {
                //alert(JSON.stringify(data));
                const chatBox = $('#chat-box');

                // Determine class based on sender
                const senderType = data.sender === 'user' ? 'message-replay' : 'message-sent';


                const messageHtml = `
            <div class="message-time text-center mb-3">
                <span class="ribbon">${new Date().toLocaleDateString()}</span>
            </div>
            <div class="conversation-item ${senderType} mb-3">
                <div class="media media-card align-items-center">
                    <div class="avatar-sm flex-shrink-0 mr-4">
                        <img class="rounded-full img-fluid" src="${data.avatar}" alt="Avatar image">
                    </div>
                    <div class="media-body d-flex align-items-center">
                        <div class="message-body">
                            <h5 class="fs-13">${data.message}</h5>
                            <span class="fs-12 d-block lh-18 pt-1">${data.time}</span>
                        </div>
                    </div>
                </div>
            </div>`;
                chatBox.append(messageHtml);
                chatBox.scrollTop(chatBox[0].scrollHeight);


            });






        });


        $(document).on('click', '.delete-icon', function() {
            const instructorId = $('.instructor-card.message-active').data('id'); // instructor_id নাও

            if (!instructorId) {
                alert('Sorry no instructor selected');
                return;
            }

            if (confirm('Are you sure to delete all conversion?')) {
                $.ajax({
                    url: '/user/instructor/messages/delete',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        instructor_id: instructorId,
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#chat-box').empty(); // চ্যাট বক্স খালি করো

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'All conversion deleted successfully!',
                                showConfirmButton: false,
                                timer: 3000
                            });

                        } else {
                            alert('Error !! something wrong');
                        }
                    },
                    error: function(error) {
                        console.error("ডিলিট করতে সমস্যা হয়েছে:", error);
                        alert('Messages are not deleted! something wrong ');
                    }
                });
            }
        });


        $(document).ready(function() {
            // সার্চ ইনপুট ফিল্ড টার্গেট করা
            $('#search-instructor').on('keyup', function() {
                const searchValue = $(this).val().toLowerCase(); // ইউজারের ইনপুট টেক্সট

                // প্রতিটি ইনস্ট্রাক্টর কার্ড লুপ করা
                $('.instructor-card').each(function() {
                    const name = $(this).data('name').toLowerCase(); // ইনস্ট্রাক্টরের নাম

                    // যদি ইনপুটের সাথে নাম মিলে যায়, তাহলে দেখাও, না হলে লুকাও
                    if (name.includes(searchValue)) {
                        $(this).show(); // মিললে দেখাও
                    } else {
                        $(this).hide(); // না মিললে লুকাও
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('click', '.instructor-card', function(e) {

            const instructor_id = $(this).data('id');

            $('#send-message').on('click', function() {


                const messageInput = $('#message');
                const message = messageInput.val();



                if (message.trim() === '') return;

                axios.post('/user/send-message', {
                        message: message,
                        instructor_id: instructor_id,
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
