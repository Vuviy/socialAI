
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--Like START--}}


<script>

    $(document).ready(function(){

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


            $.ajax
            ({
                url: '{{route('comment')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "post_id": id,
                    "text": comment,
                },
                type: 'post',
                success: function(data)
                {
                    $('.comment-body[data-id="' + id + '"]').val('')

                    if(data.success == true){

                        let loadMore = $('#load-more')
                        $('#load-more').remove()

                        $('ul[data-id="'+id+'"]').append(data.comment)
                        $('ul[data-id="'+id+'"]').append(loadMore)

                    }
                }
            });
        })
    });
</script>
{{--Like END--}}
