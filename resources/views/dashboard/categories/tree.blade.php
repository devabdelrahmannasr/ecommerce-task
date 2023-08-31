@foreach ($categories as $category)
    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
        @for ($i = 0; $i < $level; $i++) &nbsp;&nbsp; @endfor
        {{ $category->name }}
    </option>
    @if(count($category->children))
        @include('dashboard.categories.tree', ['categories' => $category->children, 'level' => $level + 1])
    @endif
@endforeach