
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--Like START--}}


<script>

    $(document).ready(function(){



        function UpdateClick(){
            $('.btn-comments').off()

            $('.btn-comments').on('click', function () {
                let targetDivs = $('.comment-block').addClass('d-none');

                let id = $(this).data('id')
                let comentCount = $(this)

                let targetDiv = $('.comment-block[data-comments-id="' + id + '"]');
                targetDiv.removeClass('d-none')

            })

            $('.send-comment').off()

            $('.send-comment').on('click', function (){

                let id = $(this).data('id')
                let comment = $('.comment-body[data-id="' + id + '"]').val();

                // console.log('.send-comment id - ' + id)

                $.ajax
                ({
                    url: '{{route('comment')}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "post_id": id,
                        "reply_id": null,
                        "text": comment,
                    },
                    type: 'post',
                    success: function(data)
                    {

                        $('.comment-body[data-id="' + id + '"]').val('')

                        if (data.success == true) {

                            let loadMore = $('#load-more')
                            $('#load-more').remove()

                            $('ul[data-id="' + id + '"]').append(data.comment)
                            $('ul[data-id="' + id + '"]').append(loadMore)

                            UpdateClick()

                        }

                    }
                });
            })


            $('.reply-btn').off()

            $('.reply-btn').click( function (){

                // console.log('.send-comment-reply reply id -')
                // console.log('.send-comment-reply reply id - ' + reply_id)
                let targetDivs = $('.reply-block').addClass('d-none');

                let oo = $('.reply-block[data-id="'+$(this).data('reply-id')+'"').removeClass('d-none')

            })

            $('.send-comment-reply').off()

            $('.send-comment-reply').click( function (){

                let post_id = $(this).data('id')
                let reply_id = $(this).data('reply-id')
                let comment = $('.comment-body-reply[data-id="' + reply_id + '"]').val();

                // console.log('.send-comment-reply : post id - ' + post_id)
                // console.log('.send-comment-reply reply id - ' + reply_id)
                $.ajax
                ({
                    url: '{{route('comment')}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "post_id": post_id,
                        "reply_id": reply_id,
                        "text": comment,
                    },
                    type: 'post',
                    success: function(data) {

                        $('.comment-body-reply[data-id="' + reply_id + '"]').val('')

                        if (data.success == true) {

                            let loadMore = $('#load-more')
                            $('#load-more').remove()

                            $('ul[data-id="' + post_id + '"]').append(data.comment)
                            $('ul[data-id="' + post_id + '"]').append(loadMore)

                            UpdateClick()

                        }
                    }

                });
            })
        }
        $('.btn-comments').on('click', function () {
            let targetDivs = $('.comment-block').addClass('d-none');

            let id = $(this).data('id')
            let comentCount = $(this)

            let targetDiv = $('.comment-block[data-comments-id="' + id + '"]');
            targetDiv.removeClass('d-none')

        })

        $('.send-comment').on('click', function (){

            let id = $(this).data('id')
            let comment = $('.comment-body[data-id="' + id + '"]').val();

            // console.log('.send-comment id - ' + id)

            $.ajax
            ({
                url: '{{route('comment')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "post_id": id,
                    "reply_id": null,
                    "text": comment,
                },
                type: 'post',
                success: function(data)
                {

                        $('.comment-body[data-id="' + id + '"]').val('')

                        if (data.success == true) {

                            let loadMore = $('#load-more')
                            $('#load-more').remove()

                            $('ul[data-id="' + id + '"]').append(data.comment)
                            $('ul[data-id="' + id + '"]').append(loadMore)

                            UpdateClick()

                        }

                }
            });
        })


        $('.reply-btn').click( function (){

            // console.log('.send-comment-reply reply id -')
            // console.log('.send-comment-reply reply id - ' + reply_id)
            let targetDivs = $('.reply-block').addClass('d-none');

            let oo = $('.reply-block[data-id="'+$(this).data('reply-id')+'"').removeClass('d-none')

        })
        $('.send-comment-reply').click( function (){

            let post_id = $(this).data('id')
            let reply_id = $(this).data('reply-id')
            let comment = $('.comment-body-reply[data-id="' + reply_id + '"]').val();

            // console.log('.send-comment-reply : post id - ' + post_id)
            // console.log('.send-comment-reply reply id - ' + reply_id)
            $.ajax
            ({
                url: '{{route('comment')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "post_id": post_id,
                    "reply_id": reply_id,
                    "text": comment,
                },
                type: 'post',
                success: function(data) {

                    $('.comment-body-reply[data-id="' + reply_id + '"]').val('')

                    if (data.success == true) {

                        let loadMore = $('#load-more')
                        $('#load-more').remove()

                        $('ul[data-id="' + post_id + '"]').append(data.comment)
                        $('ul[data-id="' + post_id + '"]').append(loadMore)

                        UpdateClick();

                    }
                }

            });
        })



    });
</script>
{{--Like END--}}
