
$(document).ready(function () {

    // Call the function to get the cart data
    fetchCart();

    function fetchCart() {

        var url = '/fetch/cart';

        $.ajax({
            url: url,
            type: 'GET',
            data: {

                _token: $('meta[name="csrf-token"]').attr('content')


            },
            success: function (response) {



                if (response.status === 'success') {
                    // #wishlist-course ডিভে HTML আপডেট করা
                    $('#cart-main-content').html(response.html);
                }


            },
            error: function (xhr) {

                let message = 'Something went wrong!';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                console.error(message);


            }
        });

    }

    $(document).on('click', '.remove-course-btn', function() {

        var id = $(this).data('id');
        var url = '/remove/cart'; // Define the remove route

        $.ajax({

            url: url,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },

            success: function(response) {
                if (response.status === 'success') {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Course removed successfully!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    fetchCart(); // Refresh the cart

                } else {
                    alert(response.message || 'Failed to remove course');
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong!';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                console.error(message);
            }


        })

    })


});

