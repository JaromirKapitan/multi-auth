<h1>Admin Login</h1>

<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <input type="email" name="email" required />
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password" required />
    <button type="submit">Login</button>
</form>
