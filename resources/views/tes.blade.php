@foreach($item as $it)
{{ $it->name }}<br>
{{ $it->price }}<br>
{{ $it->item_category->name }}<br>
@endforeach