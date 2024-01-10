
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--follow START--}}
<script>

    $(document).ready(function(){

        $('.follow').on('click', function (){

            $.ajax
            ({
                url: '{{route('follow')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "follow_id": {{$user->id}}
                },
                type: 'post',
                success: function(data)
                {
                    if(data.success == true){
                        if(!data.action){
                            $('.follow').text('Unfollow')
                        } else{

                            let i = document.createElement('i');
                            i.classList.add('bi')
                            i.classList.add('bi-patch-check')
                            $('.follow').text('')
                            $('.follow').append(i)
                            $('.follow').append(' Follow ')
                        }
                    }
                    console.log(data)
                }
            });

        })
    });

</script>
{{--follow END--}}

{{--messanging START--}}
<script>
    $(document).ready(function(){

        $('.send-message').on('click', function (){



            console.log($('div.active').attr('id'))
            {{--$.ajax--}}
            {{--({--}}
            {{--    url: '{{route('send.messaage')}}',--}}
            {{--    data: {--}}
            {{--        "_token": "{{ csrf_token() }}",--}}
            {{--        "chat_id": {{$user->id}}--}}
            {{--    },--}}
            {{--    type: 'post',--}}
            {{--    success: function(data)--}}
            {{--    {--}}
            {{--        if(data.success == true){--}}
            {{--            if(!data.action){--}}
            {{--                $('.follow').text('Unfollow')--}}
            {{--            } else{--}}

            {{--                let i = document.createElement('i');--}}
            {{--                i.classList.add('bi')--}}
            {{--                i.classList.add('bi-patch-check')--}}
            {{--                $('.follow').text('')--}}
            {{--                $('.follow').append(i)--}}
            {{--                $('.follow').append(' Follow ')--}}
            {{--            }--}}
            {{--        }--}}
            {{--        console.log(data)--}}
            {{--    }--}}
            {{--});--}}

        })
    });
</script>
{{--messanging END--}}
