<table border="1">
    <tr>
        <th>Login</th>
        <th>Name</th>
    </tr>
    <tr>
        <td>
            <a href="/packages/{{ $package->login }}">
                {{ $package->login }}
            </a></td>
        <td>{{ $package->name }}</td>
    </tr>
</table>

<hr>

<table border="1">
    <tr>
        <th>Login</th>
        <th>Contribution</th>
    </tr>
    @foreach ($contributors as $contributor)
    <tr>
        <td>{{ $contributor->login }}</td>
        <td>{{ $contributor->contribution }}</td>
    </tr>
    @endforeach
</table>
