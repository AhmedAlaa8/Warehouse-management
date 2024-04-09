@foreach ($categories as $category)
    @if ($category)
        <details>
            <summary>{{ $category->name }}</summary>
            @if ($category->kids)
                <div class="folder">
                    @include('admin.pages.category.treeElement', [
                        'categories' => $category->kids,
                    ])
                </div>
            @endif
        </details>
    @endif
@endforeach
