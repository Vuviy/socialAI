
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
                    "follow_id": {{auth()->user() ? $user->id : 'null'}},
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

        if(!$('div.active').attr('id')){

            $('.send-message').prop("disabled", true)
        }

        $('li[data-bs-dismiss="offcanvas"]').on('click', function (){
            $('.send-message').prop("disabled", false)
                let chatContent = $('div.active').find('div.chat-conversation-content');

            // // Initialize overlayScrollbars if not already initialized
            // if (!chatContent.data('overlayScrollbars')) {
            //     chatContent.overlayScrollbars({
            //         overflowBehavior: {
            //             y: 'scroll'
            //         }
            //     });
            // }
            //
            // // Scroll to the bottom
            // chatContent.overlayScrollbars().scroll({ y: '100%', behavior: 'smooth' });

            setTimeout(function (){
                chatContent.overlayScrollbars();
                chatContent.overlayScrollbars().scroll({ y: '100%', behavior: 'smooth'  });
            }, 100)
        })

        $('.send-message').on('click', function (){

            // console.log($('div.active').attr('id'))
            // console.log($('#message-content').val())

            $.ajax
            ({
                url: '{{route('send-message')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": {{auth()->user() ? $user->id : 'null'}},
                    "chat_id": $('div.active').attr('id'),
                    "message": $('#message-content').val(),
                },
                type: 'post',
                success: function(data)
                {
                    if(data.success == true){

                        $('#message-content').val('');
                       // console.log($('#message-content').text());


                        let div = $('.message-right')


                        let div1 = document.createElement('div');
                        div1.classList.add('d-flex', 'justify-content-end', 'text-end', 'mb-1')

                        let div2 = document.createElement('div');
                        div2.classList.add('w-100')

                        let div3 = document.createElement('div');
                        div3.classList.add('d-flex', 'flex-column', 'align-items-end')

                        let divMessage = document.createElement('div');
                        divMessage.classList.add('bg-primary', 'text-white', 'p-2', 'px-3', 'rounded-2')
                        divMessage.textContent = data.message

                        let divTimeCheck = document.createElement('div');
                        divTimeCheck.classList.add('d-flex', 'my-2')

                        let divTime = document.createElement('div');
                        divTime.classList.add('small', 'text-secondary')
                        divTime.textContent = data.time

                        let divCheck = document.createElement('div');
                        divCheck.classList.add('small', 'ms-2')
                        let i = document.createElement('i');
                        i.classList.add('fa-solid', 'fa-check-double', 'text-info')
                        divCheck.append(i)

                        divTimeCheck.append(divTime)
                        divTimeCheck.append(divCheck)

                        div3.append(divMessage)
                        div3.append(divTimeCheck)

                        div2.append(div3)

                        div1.append(div2)


                        $('div.active').find('div.os-content').append(div1)


                        let chatContent = $('div.active').find('div.chat-conversation-content');
                        chatContent.overlayScrollbars();
                        chatContent.overlayScrollbars().scroll({ y: '100%', behavior: 'smooth'  });


                {{--<div class="d-flex justify-content-end text-end mb-1">--}}
                {{--    <div class="w-100">--}}
                {{--        <div class="d-flex flex-column align-items-end">--}}
                {{--            <div class="bg-primary text-white p-2 px-3 rounded-2">{{$message->content}}</div>--}}
                {{--            <div class="d-flex my-2">--}}
                {{--                <div class="small text-secondary">{{\Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans()}}</div>--}}
                {{--                <div class="small ms-2"><i class="fa-solid fa-check-double text-info"></i></div>--}}
                {{--            </div>--}}
                {{--        </div>--}}
                {{--    </div>--}}
                {{--</div>--}}


                        }
                    // console.log(data)
                }
            });

        })
    });
</script>
{{--messanging END--}}

