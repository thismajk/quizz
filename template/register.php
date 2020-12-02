<div class="container">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="form">
                <h1>rejestracja</h1>
                <form method="post" action="/api/register.php">
                    <input id="username" class="form-control" type="text" maxlength="<?=USER_USERNAME_MAX_LEN?>" name="username" placeholder="login" required>
                    <input id="email" class="form-control" type="text" name="email" placeholder="email" required>
                    <input id="password" class="form-control" type="password" name="password" placeholder="hasło" required>
                    <input id="confirm_password" class="form-control" type="password" name="confirm_password" placeholder="powtórz hasło" required>
                    <div class="custom-control custom-checkbox text-left mt-3">
                        <input id="accept_tos" class="custom-control-input" type="checkbox" name="accept_tos" value="true" required>
                        <label for="accept_tos" class="custom-control-label">Akceptuje regulamin i politykę prywatności</label>
                    </div>
                    <input class="btn" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>