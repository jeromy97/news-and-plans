@include('header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Login</h2>

                    @include('modules/errors')
                    
                    <form action="{{url("login")}}" method="post">
                        @csrf
                    
                        <label for="email" class="form-label">E-mailadres<small>*</small></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <br>
                    
                        <label for="password" class="form-label">Wachtwoord<small>*</small></label>
                        <input type="password" name="password" id="password" class="form-control">
                        <br>
                    
                        <input type="submit" value="Inloggen" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
