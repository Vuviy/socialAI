
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--Like START--}}


<script>

    $(document).ready(function(){

        $('.btn-like').on('click', function () {

            let btn = $(this);

            $.ajax
            ({
                url: '{{route('like')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    {{--"user_id": {{auth()->user() ? $user->id : 'null'}},--}}
                    "post_id": $(this).data('id'),
                },
                type: 'post',
                success: function (data) {
                    if (data.success == true) {

                        let i = document.createElement('i')
                        i.classList.add('bi', 'bi-heart-fill', 'me-1', 'icon-xs', 'bg-danger', 'text-white', 'rounded-circle')
                        btn.text('')
                        btn.append(i)
                        btn.append(data.likes)
                // console.log($(this))
                // console.log(data)
                    }
                }

                // console.log($(this).data('id'))
            })
        })
    });
</script>
{{--Like END--}}
