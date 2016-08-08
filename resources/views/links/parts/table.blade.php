@if (count($links) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Long URL</th>
                <th>Short URL</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
                <tr>
                    <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                    <td><a href="{{ url($link->hash) }}">{{ url($link->hash) }}</a></td>
                    <td>{{ $link->created_at->diffForHumans() }}</td>
                    <td><a href="{{ url($link->hash . '/analytics') }}">Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@else

@endif