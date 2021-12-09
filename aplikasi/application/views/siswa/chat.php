<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col text-center">
            <h5>Pesan</h5>
        </div>
    </div>
</div>
<div class="chat">
    <div class="col text-right messaging">
        <div class="mesgs">
            <div class="incoming_msg">
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <p>Test which is a new approach to have all
                            solutions</p>
                        <span class="time_date"> 11:01 AM | June 9</span>
                    </div>
                </div>
            </div>
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p>Test which is a new approach to have all
                        solutions</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>

        </div>
        <form action="" method="post" class="form-chat">
            <div class="input-group mb-3">
                <input type="text" id="pesan-input" class="form-control" placeholder="Tulis pesan..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg></span>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('pesan-input').addEventListener('click', function() {
        document.getElementsByClassName('nav')[0].style.display = 'none'
        document.getElementsByClassName('form-chat')[0].style.bottom = '0'
    })
    document.getElementById('pesan-input').addEventListener('blur', function() {
        document.getElementsByClassName('nav')[0].style.display = 'flex'
        document.getElementsByClassName('form-chat')[0].style.bottom = '50px'
    })
</script>