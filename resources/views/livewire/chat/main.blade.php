<div>
    <div class="container-fluid">
        <div class="container mt-5 ">
            {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
            <div class="chat_container">
                <div class="chat_list_container">
                    @livewire('chat.chat-list')
                </div>
                <div class="chat_box_container">

                    @livewire('chat.chatbox')

                    @livewire('chat.send_message')
                </div>
            </div>
        </div>
    </div>
</div>