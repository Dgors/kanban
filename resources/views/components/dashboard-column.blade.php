@foreach($column_names as $column_name)
    <li class="tickets-column">
        <section class="column">
            <header class="ticket-header dashboard-text">
                <h3>{{$column_name['column_name']}}</h3>
            </header>
            <ol class="board list-ticket">
                @component('components.dashboard-ticket', ['data' => $data])
                @endcomponent
            </ol>
            <div class="button-container">
                <button class="add-ticket-button" type="button"><span class="dashboard-text add-ticket-text-color">Добавить тикет</span></button>
            </div>
        </section>
    </li>
@endforeach
