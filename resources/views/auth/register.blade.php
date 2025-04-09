<x-layout>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Registrazione
</button>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Registrazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                        @error('name')
                        <span>{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                        @error('email')
                        <span>{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        @error('password')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="is_admin"> Amministratore</label>
                        <input type="checkbox" name="is_admin" value="1"> Seleziona se amministratore
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</x-layout>