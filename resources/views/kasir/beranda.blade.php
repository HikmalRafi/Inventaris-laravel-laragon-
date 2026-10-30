<h1>Dashboard Kasir</h1>
<p>Login berhasil.</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>