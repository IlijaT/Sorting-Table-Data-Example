@if( request('sortBy') != $field)
    <i class="text-muted fa fa-sort ml-1"></i>
@elseif($direction === 'desc')
    <i class="fa fa-sort-up ml-1"></i>
@else
    <i class="fa fa-sort-down ml-1"></i>
@endif