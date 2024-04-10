

        @foreach($data as $ticket)

                <li class="ticket">
                    <div class="ticket-container">
                        <div class="ticket-status-container">
                            <div class="ticket-status">
                                <span class="status-form status-max status-color dashboard-text" aria-label="цвет: , название: ">Какой-то тэг</span>
                                <span class="status-form status-max status-color dashboard-text" aria-label="цвет: , название: ">Какой-то тэг</span>
                                <span class="status-form status-max status-color dashboard-text" aria-label="цвет: , название: ">Какой-то тэг</span>
                                <span class="status-form status-max status-color dashboard-text" aria-label="цвет: , название: ">Какой-то тэг</span>
                                <span class="status-form status-max status-color dashboard-text" aria-label="цвет: , название: ">Какой-то тэг</span>
                            </div>
                        </div>
                        <a href="" class="ticket-subject dashboard-text">{{ $ticket->text_subject }}</a>
                        <div class="ticket-created">
                            <p class="ticket-created-time dashboard-text" >{{ $ticket->created_at }}</p>
                        </div>
                    </div>

                </li>


        @endforeach


