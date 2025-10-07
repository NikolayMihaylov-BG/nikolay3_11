<div>
    @if(isset($actions['edit']))
        <a href="{{ $actions['edit'] }}" class="btn btn-info mb-2"><i class="nav-icon fa-solid fa-edit"></i></a>
    @endif

    @if(isset($actions['show']))
        <a href="{{ $actions['show'] }}" class="btn btn-info mb-2"><i class="nav-icon fa-solid fa-magnifying-glass"></i></a>
    @endif

    @if(isset($actions['delete']))
        <form method="post" action="{{ $actions['delete'] }}" class="d-inline">
            @csrf
            @method('delete')

            <button type="button" class="btn btn-danger mb-2 delete-button"><i class="nav-icon fa-solid fa-trash"></i></button>
        </form>
    @endif
</div>
